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
        $request->validate([
            'no_kamar' => 'required',
            'harga_kamar' => 'required',
            'kecepatan_internet' => 'required',
            'rating_kamar' => 'required',
            'gambar_kamar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $room = new Room;
        $room->no_kamar = $request->no_kamar;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;
        $room->rating_kamar = $request->rating_kamar;
        if ($request->hasFile('gambar_kamar')) {
            $image = $request->file('gambar_kamar');
            $room->gambar_kamar = file_get_contents($image->getRealPath());
        }    
        $room->save();

        return redirect('/rooms')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit($id_kamar) {
        $room = Room::findOrFail($id_kamar);
        return view('room.editRoom', compact('room'));
    }
        
    public function update(Request $request, $id_kamar) {
        $room = Room::findOrFail($id_kamar);
        $request->validate([
            'no_kamar' => 'required',
            'harga_kamar' => 'required',
            'kecepatan_internet' => 'required',
            'rating_kamar' => 'required',
            'gambar_kamar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $room->no_kamar = $request->no_kamar;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;
        $room->rating_kamar = $request->rating_kamar;
        if ($request->hasFile('gambar_kamar')) {
            $image = $request->file('gambar_kamar');
            $room->gambar_kamar = file_get_contents($image->getRealPath());
        }
    
        $room->save(); 

        return redirect('/rooms')->with('success', 'Kamar berhasil diperbarui.'); 
    }
    
    public function delete($id_kamar) {
        $room = Room::findOrFail($id_kamar);
        $room->delete();

        return redirect('/rooms')->with('success', 'Kamar berhasil dihapus.');
    }
}