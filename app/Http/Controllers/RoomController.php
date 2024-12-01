<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Room;
use App\Models\Building;
use App\Models\Criteria;
use App\Models\Facility;
use App\Models\Condition;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\List_;
use Illuminate\Support\Facades\Log;


class RoomController extends Controller {

    protected $r;
    public function __construct(Room $r){
        $this->r = $r;
    }
    public function read() {

        if(auth('owner')->user()){
            return view('room.rooms', ['rooms' => $this->r->all()]);
        }
        else {
            $roomRanking = $this->r->with(['rates', 'facilities.condition'])
                ->doesntHave('rents')
                ->withAvg('rates', 'rate')
                ->get();
        
            $roomsArray = $roomRanking->map(function ($room) {
                $averageConditionIndex = $room->facilities->avg(function ($facility) {
                    return $facility->condition['index']; 
                });
                $roomArray = $room->toArray();
                $roomArray['average_condition_index'] = $averageConditionIndex;
                return $roomArray;
            })->toArray();
        
            $criteria = Criteria::all();
            $criteriaWeights = [
                'harga_kamar' => $criteria->firstWhere('criteria_name','harga_kamar')->weight,    
                'kecepatan_internet' => $criteria->firstWhere('criteria_name','kecepatan_internet')->weight,
                'rates_avg_rate' => $criteria->firstWhere('criteria_name','rates_avg_rate')->weight,
                'average_condition_index' => $criteria->firstWhere('criteria_name','average_condition_index')->weight,
            ];
        
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
    
            return view('roomPublicList', ['rooms' => $this->r->all(),'topRooms' => $topRooms]);
        }
    }

    public function add() {

        return view('room.addRoom',['conditions' => Condition::all()]);
    }

    public function submit(Request $request) {

        $validate = $request->validate([
            'no_kamar' => 'required|integer',
            'id_bangunan' => 'required',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'required|image|max:100000',
            'deskripsi' => 'required',
        ]);
        $validate['remember_token'] = Str::random(16);
        
        if($request->gambar_kamar){
            $validate['gambar_kamar'] = $request->file('gambar_kamar')->store('room-images');
        }

        if($this->r->create($validate)){
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
                $facility->room_id = $this->r->firstWhere('token', $validate['token'])->id_kamar;
                $facility->condition_id = $i['condition'];
                $facility->name = $i['name'];
                if($i['image']) {
                    $facility->image = $i['image']->store('room-images');
                }
                $facility->save();
            }
            return redirect('/rooms')->with('success', 'The room has been successfully added.');
        } else {
            return redirect('/rooms')->with('failed', 'The room failed to be added.');
        }
    }

    public function edit($remember_token) {
        
        $room = $this->r->firstWhere('remember_token',$remember_token);
        $facility = Facility::all()->Where('room_id',$room->id_kamar);

        return view('room.editRoom', [
            'room' => $this->r->firstWhere('remember_token',$room->remember_token),
            'bedroom' => $facility->firstWhere('name','Bedroom'),
            'bathroom' => $facility->firstWhere('name','Bathroom'),
            'kitchen' => $facility->firstWhere('name','Kitchen'),
            'security' => $facility->firstWhere('name','Security'),
            'conditions' => Condition::all()
        ]);
    }

    public function update(Request $request) {

        $room = $this->r->firstWhere('remember_token',$request->remember_token);
    
        $validate = $request->validate([
            'no_kamar' => 'required|integer',
            'id_bangunan' => 'required',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'nullable|image',
            'deskripsi'=> 'nullable',
        ]);
    
        if ($request->hasFile('gambar_kamar')) {
            $file = $request->file('gambar_kamar');
            $path = $file->store('room-images', 'public');
            $validate['gambar_kamar'] = $path;
        }

        if($room->update($validate)) {

            $facilities = [
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

            foreach ($facilities as $data) {
                $facility = Facility::where('room_id',$room->id_kamar)->where('name',$data['name'])->first();
                if($facility) {
                    $facility->condition_id = $data['condition'];
                    if($data['image']) {
                        $facility->image = $data['image']->store('room-images');
                    }
                    $facility->update();
                }
                else {
                    $facility = new Facility();
                    $facility->room_id = $room->id_kamar;
                    $facility->condition_id = $data['condition'];
                    $facility->name = $data['name'];
                    if($data['image']) {
                        $facility->image = $data['image']->store('room-images');
                    }
                    $facility->save();
                }
            }
            return redirect('/rooms')->with('success', 'The room has been successfully updated.');
        } else {
            return redirect('/rooms')->with('failed', 'The room update was fail.');
        }
    }

    public function delete(Request $request) {

        $room = $this->r->firstWhere('remember_token',$request->remember_token);

        if($room){
            if(!$room->rents()->exists()) {
                if($room->facilities()->exists()){
                    Facility::Where('room_id',$room->id_kamar)->delete();
                }
                if($room->rates()->exists()){
                    Rate::Where('id_kamar',$room->id_kamar)->delete();
                }
                if($room->transaction()->exists()) {
                    Transaction::Where('room_id',$room->id_kamar)->delete();
                }
                if($room->delete()){
                    return redirect('/rooms')->with('success', "Room '{$room->building->unit_bangunan}{$room->no_kamar} - {$room->building->alamat_bangunan}' has been deleted.");
                } else {
                    return redirect('/rooms')->with('failed', "Failed to delete the room.");
                }
            } else {
                return redirect('/rooms')->with('failed', "The room is currently under active rental.");
            }
        } else {
            return redirect('/buildings')->with('failed', "Room not found or deletion failed.");
        }
    }
}