<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\List_;


class RoomController extends Controller {

    public function read(){
        $rooms = Room::all();
        return view('room.rooms', compact('rooms'));
    }

    public function add() {
        $room = Room::all();
        return view('room.addRoom',['room' => $room]);
    }

    public function submit(Request $request) {

        $room = $request->validate([
            'no_kamar' => 'required|integer',
            'id_bangunan' => 'required',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'required|image|max:100000',
        ]);
        $room['token'] = Str::random(16);
        
        if($request->gambar_kamar){
            $room['gambar_kamar'] = $request->file('gambar_kamar')->store('room-images');
        }

        Room::create($room);
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

    public function publicList() {

        $rooms = Room::doesntHave('rents')->get();

        // $roomRanking = Room::with(['ratings', 'fasilitas'])
        // ->doesntHave('rents') // Mengambil Room yang tidak memiliki entri Rent
        // ->withAvg('ratings', 'score') // Mengambil rata-rata score ratings
        // ->withAvg('fasilitas', 'index_fasilitas') // Mengambil rata-rata index_fasilitas
        // ->get();
                
        // $roomsArray = $roomRanking->toArray();

        // // Bobot untuk setiap kriteria
        // $criteriaWeights = [
        //     'harga_kamar' => 0.4,    // Harga (cost) - semakin murah semakin baik
        //     'kecepatan_internet' => 0.2,    // kecepatan_internet (benefit) - semakin cepat semakin baik
        //     'index_fasilitas' => 0.25,     // index fasilitas (benefit) - semakin tinggi semakin baik
        //     'rating' => 0.15          // Rating (benefit) - semakin tinggi semakin baik
        // ];
    
        // // Hitung total kuadrat untuk setiap kriteria
        // $squareSums = [
        //     'harga_kamar' => sqrt(array_sum(array_map(fn($room) => pow($room['harga_kamar'], 2), $roomsArray))),
        //     'luas_kamar' => sqrt(array_sum(array_map(fn($room) => pow($room['luas_kamar'], 2), $roomsArray))),
        //     'rating' => sqrt(array_sum(array_map(fn($room) => pow($room['rating'], 2), $roomsArray))),
        // ];
    
        // // Normalisasi matriks
        // $normalizedMatrix = [];
        // foreach ($roomsArray as $room) {
        //     $normalizedMatrix[] = [
        //         'id' => $room['id'],
        //         'harga_kamar' => $room['harga_kamar'] / $squareSums['harga_kamar'],
        //         'luas_kamar' => $room['luas_kamar'] / $squareSums['luas_kamar'],
        //         'rating' => $room['rating'] / $squareSums['rating']
        //     ];
        // }
    
        // // Bobot matriks normalisasi
        // $weightedMatrix = [];
        // foreach ($normalizedMatrix as $room) {
        //     $weightedMatrix[] = [
        //         'id' => $room['id'],
        //         'harga_kamar' => $room['harga_kamar'] * $criteriaWeights['harga_kamar'],
        //         'luas_kamar' => $room['luas_kamar'] * $criteriaWeights['luas_kamar'],
        //         'rating' => $room['rating'] * $criteriaWeights['rating']
        //     ];
        // }
    
        // // Solusi ideal positif dan negatif
        // $idealPositive = [
        //     'harga_kamar' => min(array_column($weightedMatrix, 'harga_kamar')),
        //     'luas_kamar' => max(array_column($weightedMatrix, 'luas_kamar')),
        //     'rating' => max(array_column($weightedMatrix, 'rating'))
        // ];
    
        // $idealNegative = [
        //     'harga_kamar' => max(array_column($weightedMatrix, 'harga_kamar')),
        //     'luas_kamar' => min(array_column($weightedMatrix, 'luas_kamar')),
        //     'rating' => min(array_column($weightedMatrix, 'rating'))
        // ];
    
        // // Hitung jarak solusi positif dan negatif
        // $distancePositive = [];
        // $distanceNegative = [];
        // foreach ($weightedMatrix as $room) {
        //     $distancePositive[$room['id']] = sqrt(
        //         pow($room['harga_kamar'] - $idealPositive['harga_kamar'], 2) +
        //         pow($room['luas_kamar'] - $idealPositive['luas_kamar'], 2) +
        //         pow($room['rating'] - $idealPositive['rating'], 2)
        //     );
        //     $distanceNegative[$room['id']] = sqrt(
        //         pow($room['harga_kamar'] - $idealNegative['harga_kamar'], 2) +
        //         pow($room['luas_kamar'] - $idealNegative['luas_kamar'], 2) +
        //         pow($room['rating'] - $idealNegative['rating'], 2)
        //     );
        // }
    
        // // Hitung skor preferensi
        // $preferences = [];
        // foreach ($distancePositive as $id => $dPos) {
        //     $dNeg = $distanceNegative[$id];
        //     $preferences[$id] = $dNeg / ($dPos + $dNeg);
        // }
    
        // // Urutkan kamar berdasarkan preferensi tertinggi ke terendah
        // arsort($preferences);
    
        // // Ambil 3 kamar teratas
        // $topRoomIds = array_slice(array_keys($preferences), 0, 3);
    
        // // Dapatkan detail kamar teratas
        // $topRooms= Room::whereIn('id', $topRoomIds)->get();
    
        // Return view dengan data kamar teratas

        return view('roomPublicList', ['rooms' => $rooms]);
    }
}