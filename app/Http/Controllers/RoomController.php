<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Room;
use Illuminate\Support\Facades\Log;


class RoomController extends Controller {

    public function read(){
        $rooms = Room::all();
        return view('room.rooms', compact('rooms'));
    }

    public function add() {
        $buildings = Building::all(); // Ambil semua bangunan
        return view('room.addRoom', compact('buildings'));
    }
    

    public function submit(Request $request)
    {
        Log::info('Received request data: ', $request->all());
    
        $request->validate([
            'id_bangunan' => 'required|exists:buildings,id_bangunan', // Validasi bangunan yang valid
            'no_kamar' => 'required|integer',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'required|image|mimes:png,jpg,jpeg|max:100000',
        ]);
    
        // Inisialisasi Room baru dengan atribut yang sudah divalidasi
        $room = new Room($request->only(['id_bangunan', 'no_kamar', 'harga_kamar', 'kecepatan_internet']));
    
        if ($request->hasFile('gambar_kamar')) {
            $path = $request->file('gambar_kamar')->store('room-images', 'public');
            $room->gambar_kamar = $path;
        }
    
        $room->save();
        return redirect('/rooms')->with('success', 'Kamar berhasil ditambahkan.');
    }
    
    public function update(Request $request, $id_kamar) {
        $request->validate([
            'id_bangunan' => 'required|exists:buildings,id_bangunan',
            'no_kamar' => 'required|integer',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'image|mimes:png,jpg,jpeg|max:100000',
        ]);
    
        $room = Room::findOrFail($id_kamar);
    
        $room->fill($request->only(['id_bangunan', 'no_kamar', 'harga_kamar', 'kecepatan_internet']));
    
        if ($request->hasFile('gambar_kamar')) {
            $path = $request->file('gambar_kamar')->store('room-images', 'public');
            $room->gambar_kamar = $path;
        }
    
        $room->save();
        return redirect('/rooms')->with('success', 'Kamar berhasil diperbarui.');
    }
    

    public function edit($id_kamar) {
        $room = Room::where('id_kamar',$id_kamar)->first();
        return view('room.editRoom', compact('room'));
    }

    public function updates(Request $request, $id_kamar) {

        $request->validate([
            'no_kamar' => 'required|integer',
            'id_bangunan' => 'required',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'image|mimes:png,jpg,jpeg|max:100000',
        ]);


        $room = Room::where('id_kamar',$id_kamar)->first();

        $building = Building::where('id_bangunan', $request->id_bangunan)->first();
        if ($building) {
            $room->no_kamar = $building->unit_bangunan . $request->no_kamar;
        } else {
            $room->no_kamar = $request->no_kamar;
        }

        $room->id_bangunan = $request->id_bangunan;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;

        if($request->hasFile('gambar_kamar')){
            $path = $request->file('gambar_kamar')->store('room-images', 'public');
            $room->gambar_kamar = $path;
        }

        // if ($request->hasFile('gambar_kamar')) {
        //     $file = $request->file('gambar_kamar');
        //     $path = $file->store('images', 'public');
        //     $room->gambar_kamar = $path;
        // }
        $room->save();

        return redirect('/rooms')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function delete($id_kamar) {
        $room = Room::where('id_kamar',$id_kamar)->first();
        $room->delete();

        return redirect('/rooms')->with('success', 'Kamar berhasil dihapus.'); // Menggunakan flash message
    }
}