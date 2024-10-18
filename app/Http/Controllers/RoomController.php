<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Room;

class RoomController extends Controller {
    
    public function read(){
        $rooms = Room::all();
        return view('room.rooms', compact('rooms'));
    }    

    public function add() {
        return view('room.addRoom');
    }

    public function submit(Request $request) {
        $room = new Room;
        $room->id_bangunan = $request->id_bangunan;
        $room->no_kamar = $request->no_kamar;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;
        $room->save();

        return redirect('/rooms')->with('success', 'Kamar berhasil ditambahkan.'); // Menggunakan flash message
    }

    public function edit($id_kamar) {
        $room = Room::findOrFail($id_kamar); // Menggunakan findOrFail untuk menangani ID tidak ditemukan
        return view('room.editRoom', compact('room'));
    }
    public function update(Request $request, $id_kamar) {
        $room = Room::findOrFail($id_kamar);
        $room->no_kamar = $request->no_kamar;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;
        $room->save(); // Menyimpan perubahan

        return redirect('/rooms')->with('success', 'Kamar berhasil diperbarui.'); // Menggunakan flash message
    }
    
    public function delete($id_kamar) {
        $room = Room::findOrFail($id_kamar);
        $room->delete();

        return redirect('/rooms')->with('success', 'Kamar berhasil dihapus.'); // Menggunakan flash message
    }
}