<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Rent;
use App\Models\Tenant;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function editProfile(Request $request) {

        $tenant = Tenant::firstWhere('id',auth('tenant')->user()->id);

        $data = $request->validate([
            'image' => 'image',
            'username' => 'required|min:3|max:255',
            'name' => 'required|min:3|max:255',
            'phone_number' => 'required|min:11',
        ]);

        if($request->image){
            $data['image'] = $request->file('image')->store('profile-images');
        }

        $tenant->update($data);

        return redirect('/');
    }

    public function rentedRoom() {

        $id_penyewa = auth('tenant')->user()->id;

        $rent = Rent::firstWhere('id_penyewa', $id_penyewa);

        if($rent){

            $avgRoomRate = number_format(Rate::firstWhere('id_kamar', $rent->room->id_kamar)->avg('rate'),1);
    
            $hasRate = Rate::where('id_kamar', $rent->room->id_kamar)->where('id_penyewa',$id_penyewa)->first();
    
            return view('myRoom',['rent' => $rent, 'hasRate' => $hasRate ,'avgRoomRate' => $avgRoomRate]);
        } else {
            return view('myRoom',['rent' => $rent]);
        }

    }

    public function discardRentedRoom($token)  {
        $rent = Rent::where('token',$token)->first();
        $rent->delete();
        return redirect('/');
    }
}
