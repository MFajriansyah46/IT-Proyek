<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Laravel\Sail\Console\AddCommand;

class RoomController extends Controller {
    //
    public function read(){
        $rooms = Room::all();
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

    public function edit($id){
        $rooms = Room::find($id);
        return view('room.editRoom',compact('rooms'));
    }
    
    function update(Request $request, $id){
        $room = Room::find($id);
        $room->no_kamar = $request->no_kamar;
        $room->harga_kamar = $request->harga_kamar;
        $room->kecepatan_internet = $request->kecepatan_internet;
        $room->rating_kamar = $request->rating_kamar;
        $room->update();

        return redirect('/rooms');
    }
    
    function delete($id){
        $room = Room::find($id);
        $room->delete();
        
        return redirect('/rooms');
    }
}