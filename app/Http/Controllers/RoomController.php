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
        $room = Room::all();
        return view('room.addRoom',['room' => $room ]);
    }

    public function submit(Request $request) {

        $room = $request->validate([
            'no_kamar' => 'required|integer',
            'id_bangunan' => 'required',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'required|imag|mimes:png,jpg,jpeg|max:100000',
        ]);
;
        if($request->gambar_kamar){
            $room['gambar_kamar'] = $request->file('gambar_kamar')->store('room-images');
        }

        Room::create($room);
        return redirect('/rooms')->with('success-add-room', 'Kamar berhasil ditambahkan.');
    }

    public function edit($id_kamar) {
        $room = Room::find($id_kamar);
        return view('room.editRoom', compact('room'));
    }
    public function update(Request $request, $id_kamar) {
        
        $room = Room::findOrFail($id_kamar);
    
        $validatedData = $request->validate([
            'no_kamar' => 'required|integer',
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