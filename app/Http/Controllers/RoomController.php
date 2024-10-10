<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Laravel\Sail\Console\AddCommand;
use Illuminate\Support\Facades\Hash;

class RoomController extends Controller {
    //
    public function read(){
        $rooms = Room::get();
        return view('room.rooms',compact('rooms'));
    }    

    public function add() {
        return view('room.addRoom');
    }

    public function submit(Request $request) {
            $room = new Room;
            $room->no_kamar = $request->no_kamar;
            $room->harga_kamar = $request->harga_kamar;
            $room->kecepatan_internet = $request->kecepatan_internet;
            $room->rating_kamar = $request->rating_kamar;
            $room->save();

            return redirect('/rooms');
    }

    public function edit($id_kamar)
    {
        $room = Room::where('id_kamar', $id_kamar)->firstOrFail();
        return view('room.editRoom', compact('room'));
    }
        
    public function update(Request $request, $id_kamar){
        $room = Room::findOrFail($id_kamar);
        $room->no_kamar = $request->no_kamar;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;
        $room->rating_kamar = $request->rating_kamar;
        $room->update();

        return redirect('/rooms');
    }
    
    public function delete($id_kamar)
    {
        $room = Room::where('id_kamar', $id_kamar)->firstOrFail();
        $room->delete();
        return redirect()->route('/rooms');
    }
        
    // function delete($id_kamar){
    //     $room = Room::find($id_kamar);
    //     $room->delete();
        
    //     return redirect('/rooms');
    // }
}