<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Criteria;
use App\Models\Facility;
use App\Models\Room;
use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\List_;


class RoomController extends Controller {

    public function read() {

        if(auth('owner')->user()){
            $rooms = Room::all();
            return view('room.rooms', compact('rooms'));
        }
        else {
            $rooms = Room::doesntHave('rents')->get();
            $roomRanking = Room::with(['rates', 'facilities.condition'])
                ->doesntHave('rents')
                ->withAvg('rates', 'rate')
                ->get();
        
            // Tambahkan rata-rata indeks kondisi fasilitas ke setiap kamar
            $roomsArray = $roomRanking->map(function ($room) {
                $averageConditionIndex = $room->facilities->avg(function ($facility) {
                    return $facility->condition['index']; 
                });
        
                $roomArray = $room->toArray();
                $roomArray['average_condition_index'] = $averageConditionIndex;
                return $roomArray;
            })->toArray();
        
            // Bobot untuk setiap kriteria
            $criteriaWeights = [
                'harga_kamar' => Criteria::firstWhere('criteria_name','harga_kamar')->weight,    
                'kecepatan_internet' => Criteria::firstWhere('criteria_name','kecepatan_internet')->weight,
                'rates_avg_rate' => Criteria::firstWhere('criteria_name','rates_avg_rate')->weight,
                'average_condition_index' => Criteria::firstWhere('criteria_name','average_condition_index')->weight,
            ];
        
            // Hitung total kuadrat (pembagi) untuk setiap kriteria
            $squareSums = [
                'harga_kamar' => sqrt(array_sum(array_map(fn($room) => pow($room['harga_kamar'], 2), $roomsArray))),
                'kecepatan_internet' => sqrt(array_sum(array_map(fn($room) => pow($room['kecepatan_internet'], 2), $roomsArray))),
                'rates_avg_rate' => sqrt(array_sum(array_map(fn($room) => pow($room['rates_avg_rate'], 2), $roomsArray))),
                'average_condition_index' => sqrt(array_sum(array_map(fn($room) => pow($room['average_condition_index'], 2), $roomsArray))),
            ];  
    
            if( !$squareSums['rates_avg_rate']) {
                $squareSums['rates_avg_rate'] = 1;
            }
            if( !$squareSums['average_condition_index']) {
                $squareSums['average_condition_index'] = 1;
            }
        
            // Normalisasi matriks
            $normalizedMatrix = [];
            foreach ($roomsArray as $room) {
                $normalizedMatrix[] = [
                    'id_kamar' => $room['id_kamar'],
                    'harga_kamar' => $room['harga_kamar'] / $squareSums['harga_kamar'],
                    'kecepatan_internet' => $room['kecepatan_internet'] / $squareSums['kecepatan_internet'],
                    'rates_avg_rate' => $room['rates_avg_rate'] / $squareSums['rates_avg_rate'],
                    'average_condition_index' => $room['average_condition_index'] / $squareSums['average_condition_index'],
                ];
            }
    
            // Normalisasi matriks * bobot
            $weightedMatrix = [];
            foreach ($normalizedMatrix as $normalizedRoom) {
                $weightedMatrix[] = [
                    'id_kamar' => $normalizedRoom['id_kamar'],
                    'harga_kamar' => $normalizedRoom['harga_kamar'] * $criteriaWeights['harga_kamar'],
                    'kecepatan_internet' => $normalizedRoom['kecepatan_internet'] * $criteriaWeights['kecepatan_internet'],
                    'rates_avg_rate' => $normalizedRoom['rates_avg_rate'] * $criteriaWeights['rates_avg_rate'],
                    'average_condition_index' => $normalizedRoom['average_condition_index'] * $criteriaWeights['average_condition_index'],
                ];
            }
        
            // Solusi ideal positif dan negatif
            $idealPositive = [
                'harga_kamar' => min(array_column($weightedMatrix, 'harga_kamar')),
                'kecepatan_internet' => max(array_column($weightedMatrix, 'kecepatan_internet')),
                'rates_avg_rate' => max(array_column($weightedMatrix, 'rates_avg_rate')),
                'average_condition_index' => max(array_column($weightedMatrix, 'average_condition_index'))
            ];
        
            $idealNegative = [
                'harga_kamar' => max(array_column($weightedMatrix, 'harga_kamar')),
                'kecepatan_internet' => min(array_column($weightedMatrix, 'kecepatan_internet')),
                'rates_avg_rate' => min(array_column($weightedMatrix, 'rates_avg_rate')),
                'average_condition_index' => min(array_column($weightedMatrix, 'average_condition_index'))
            ];
        
            // Hitung jarak solusi positif dan negatif
            $distancePositive = [];
            $distanceNegative = [];
            foreach ($weightedMatrix as $room) {
                $distancePositive[$room['id_kamar']] = sqrt(
                    pow($room['harga_kamar'] - $idealPositive['harga_kamar'], 2) +
                    pow($room['kecepatan_internet'] - $idealPositive['kecepatan_internet'], 2) +
                    pow($room['rates_avg_rate'] - $idealPositive['rates_avg_rate'], 2) +
                    pow($room['average_condition_index'] - $idealPositive['average_condition_index'], 2)
                );
                $distanceNegative[$room['id_kamar']] = sqrt(
                    pow($room['harga_kamar'] - $idealNegative['harga_kamar'], 2) +
                    pow($room['kecepatan_internet'] - $idealNegative['kecepatan_internet'], 2) +
                    pow($room['rates_avg_rate'] - $idealNegative['rates_avg_rate'], 2) +
                    pow($room['average_condition_index'] - $idealNegative['average_condition_index'], 2)
                );
            }
        
            // Hitung skor preferensi
            $preferences = [];
            foreach ($distancePositive as $id => $dPos) {
                $dNeg = $distanceNegative[$id];
                $preferences[$id] = $dNeg / ($dPos + $dNeg);
            }
        
            // Urutkan kamar berdasarkan preferensi tertinggi ke terendah
            arsort($preferences);
        
            // Ambil 3 kamar teratas
            $topRoomIds = array_slice(array_keys($preferences), 0, 3);
        
            // Dapatkan detail kamar teratas
            $topRooms = Room::whereIn('id_kamar', $topRoomIds)->get();
    
            return view('roomPublicList', ['rooms' => $rooms,'topRooms' => $topRooms]);
        }
    }

    public function add() {
        $room = Room::all();
        $conditions = Condition::all();
        return view('room.addRoom',['room' => $room, 'conditions' => $conditions]);
    }

    public function submit(Request $request) {

        $room = $request->validate([
            'no_kamar' => 'required|integer',
            'id_bangunan' => 'required',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'required|image|max:100000',
            'deskripsi' => 'required',
        ]);
        $room['token'] = Str::random(16);
        
        if($request->gambar_kamar){
            $room['gambar_kamar'] = $request->file('gambar_kamar')->store('room-images');
        }

        Room::create($room);

        $data = [
            [
                'condition' => $request->bedroom_condition_id,
                'name' => 'Bedroom',
                'image' => $request->file('bedroom_image'),
            ],
            [
                'condition' => $request->bathroom_condition_id,
                'name' => 'Bathroom',
                'image' => $request->file('bathroom_image'),
            ],
            [
                'condition' => $request->kitchen_condition_id,
                'name' => 'Kitchen',
                'image' => $request->file('kitchen_image'),
            ],
            [
                'condition' => $request->security_condition_id,
                'name' => 'Security',
                'image' => $request->file('security_image'),
            ]
        ];
        
        foreach ($data as $i) {
            $facility = new Facility();
            $facility->room_id = Room::firstWhere('token', $room['token'])->id_kamar;
            $facility->condition_id = $i['condition'];
            $facility->name = $i['name'];
            if($i['image']) {
                $facility->image = $i['image']->store('room-images');
            }
            $facility->save();
        }

        return redirect('/rooms')->with('success-add-room', 'Kamar berhasil ditambahkan.');
    }

    public function edit($id_kamar) {
        $room = Room::where('id_kamar',$id_kamar)->first();
        return view('room.editRoom', compact('room'));
    }

    public function update(Request $request, $id_kamar) {

        $room = Room::findOrFail($id_kamar);
    
        $validatedData = $request->validate([
            'no_kamar' => 'required|integer',
            'id_bangunan' => 'required',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'nullable|image|mimes:png,jpg,jpeg|max:100000',
        ]);
    
        if ($request->hasFile('gambar_kamar')) {
            $file = $request->file('gambar_kamar');
            $path = $file->store('room-images', 'public');
            $validatedData['gambar_kamar'] = $path;
        }
    
        $room->update($validatedData);
    
        return redirect('/rooms')->with('success', 'Kamar berhasil diperbarui.');
    }
    

    public function delete($id_kamar) {
        $room = Room::findOrFail($id_kamar);
        if ($room) {
            $room->delete();
        }
        return redirect('/rooms')->with('success', 'Kamar berhasil dihapus.'); // Menggunakan flash message
    }
}