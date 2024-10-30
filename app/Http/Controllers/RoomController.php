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

    public function submit(Request $request)
    {
        Log::info('Received request data: ', $request->all());

        $request->validate([
            'room_number' => 'required|integer',
            'price' => 'required|numeric',
            'internet_speed' => 'required|integer',
            'images' => 'required|image|mimes:png,jpg,jpeg|max:100000',
        ]);

        // $path = null;

        // if ($request->hasFile('images')) {
        //     Log::info('File images uploaded successfully.');
        //     $file = $request->file('images');
        //     Log::info('File details: ', ['name' => $file->getClientOriginalName(), 'mime' => $file->getMimeType()]);

        //     $path = $file->store('images', 'public');
        //     Log::info('File stored at: ' . $path);
        // } else {
        //     Log::error('File images not uploaded.');
        //     return back()->withErrors(['images' => 'Tidak diupload']);
        // }

        // $building = Building::where('id_bangunan',$request->id_bangunan)->first();

        $building = Building::where('id_bangunan', $request->id_bangunan)->first();
        if(!$building){
            return back()->withErrors(['id_bangunan'=>'Bangunan tidak ditemukan']);
        }

        $room = new Room();
        $room->id_bangunan = $request->id_bangunan;
        $room->room_number = $building->unit_bangunan.$request->room_number;
        // $building->images = $request->images;
        $room->price = $request->price;
        $room->internet_speed = $request->internet_speed;

        if($request->hasFile('images')){
            $path = $request->file('images')->store('room-images', 'public');
            $room->images = $path;
        }

        $room->save();

        return redirect('/rooms')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit($room_id) {
        $room = Room::where('room_id',$room_id)->first();
        return view('room.editRoom', compact('room'));
    }

    public function update(Request $request, $room_id) {

        $request->validate([
            'room_number' => 'required|integer',
            'id_bangunan' => 'required',
            'price' => 'required|numeric',
            'internet_speed' => 'required|integer',
            'images' => 'image|mimes:png,jpg,jpeg|max:100000',
        ]);


        $room = Room::where('room_id',$room_id)->first();

        $room->room_number = $request->room_number;
        $room->id_bangunan = $request->id_bangunan;
        $room->price = $request->price;
        $room->internet_speed = $request->internet_speed;

        if($request->hasFile('images')){
            $path = $request->file('images')->store('room-images', 'public');
            $room->images = $path;
        }

        // if ($request->hasFile('images')) {
        //     $file = $request->file('images');
        //     $path = $file->store('images', 'public');
        //     $room->images = $path;
        // }
        $room->save();

        return redirect('/rooms')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function delete($room_id) {
        $room = Room::where('room_id',$room_id)->first();
        $room->delete();

        return redirect('/rooms')->with('success', 'Kamar berhasil dihapus.'); // Menggunakan flash message
    }
}
