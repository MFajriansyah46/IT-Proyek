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
        return view('room.addRoom');
    }

    public function submit(Request $request) {
        Log::info('Received request data: ', $request->all());

        $request->validate([
            'no_kamar' => 'required|integer',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'required|image|mimes:png,jpg,jpeg|max:100000',
        ]);

        $path = null;

        if ($request->hasFile('gambar_kamar')) {
            Log::info('File gambar_kamar uploaded successfully.');
            $file = $request->file('gambar_kamar');
            Log::info('File details: ', ['name' => $file->getClientOriginalName(), 'mime' => $file->getMimeType()]);

            $path = $file->store('images', 'public');
            Log::info('File stored at: ' . $path);
        } else {
            Log::error('File gambar_kamar not uploaded.');
            return back()->withErrors(['gambar_kamar' => 'Tidak diupload']);
        }

        // $building = Building::where('id_bangunan',$request->id_bangunan)->first();

        $room = new Room;
        $room->id_bangunan = $request->id_bangunan;
        $room->no_kamar = $request->no_kamar;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;
        $room->save();

        return redirect('/rooms')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit($id_kamar) {
        $room = Room::find($id_kamar);
        return view('room.editRoom', compact('room'));
    }
    public function update(Request $request, $id_kamar) {

        $request->validate([
            'no_kamar' => 'required|integer',
            'harga_kamar' => 'required|numeric',
            'kecepatan_internet' => 'required|integer',
            'gambar_kamar' => 'image|mimes:png,jpg,jpeg|max:100000',
        ]);

        $room = Room::findOrFail($id_kamar);
        $room->id_bangunan = $request->id_bangunan;
        $room->no_kamar = $request->no_kamar;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;

        if ($request->hasFile('gambar_kamar')) {
            $file = $request->file('gambar_kamar');
            $path = $file->store('images', 'public');
            $room->gambar_kamar = $path;
        }
        $room->save();

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
