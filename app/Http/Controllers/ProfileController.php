<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Rent;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    
    public function editProfile(Request $request) {

        if($request->password) {
            if(auth('tenant')->user()->username == $request->username) {
                $validate = $request->validate([
                    'image' => 'image|nullable',
                    'name' => 'required|min:3|max:255',
                    'phone_number' => 'required|min:11',
                    'password' => 'required|min:8',
                ]);
            } else {
                $validate = $request->validate([
                    'image' => 'image|nullable',
                    'username' => 'required|min:3|max:255|unique:tenants,username',
                    'name' => 'required|min:3|max:255',
                    'phone_number' => 'required|min:11',
                    'password' => 'required|min:8',
                ]);
            }
        } else {
            if(auth('tenant')->user()->username == $request->username) {
                $validate = $request->validate([
                    'image' => 'image|nullable',
                    'name' => 'required|min:3|max:255',
                    'phone_number' => 'required|min:11',
                ]);
            } else {
                $validate = $request->validate([
                    'image' => 'image|nullable',
                    'username' => 'required|min:3|max:255|unique:tenants,username',
                    'name' => 'required|min:3|max:255',
                    'phone_number' => 'required|min:11',
                ]);
            }
        }

        if($request->image){
            $validate['image'] = $request->file('image')->store('profile-images');
        }

        if($request->password == $request->confirm_password) {
            if(Tenant::firstWhere('id',auth('tenant')->user()->id)->update($validate)) {

                return redirect('/')->with('success','Your profile has been updated.');
            } else {
    
                return redirect('/')->with('failed','Your profile failed to update.');
            }
        } else {
            return back()->with('password-confirm-error','The password and confirmation password do not match.')->with('failed','Your profile failed to update.');
        }

    }

    public function rentedRoom() {

        $id_penyewa = auth('tenant')->user()->id;

        $rent = Rent::firstWhere('id_penyewa', $id_penyewa);

        if($rent){

            if(Rate::firstWhere('id_kamar', $rent->room->id_kamar)){
                $avgRoomRate = number_format(Rate::firstWhere('id_kamar', $rent->room->id_kamar)->avg('rate'),1);
            } else {
                $avgRoomRate = '0.0';
            }
    
            $hasRate = Rate::where('id_kamar', $rent->room->id_kamar)->where('id_penyewa',$id_penyewa)->first();
    
            return view('myRoom',['rent' => $rent, 'hasRate' => $hasRate ,'avgRoomRate' => $avgRoomRate]);
        } else {
            return view('myRoom',['rent' => $rent]);
        }

    }

    public function downloadProof($doc)
    {
        $filePath = "documents/{$doc}";
    
        if (Storage::exists($filePath)) {
            return Storage::download($filePath, 'example.docx');
        } else {
            return redirect('/myroom')->with('failed', 'File not found!');
        }
    }    

    public function discardRentedRoom($token)  {
        if($rent = Rent::firstWhere('token',$token)){
            if($rent->delete()) {
                return back()->with('success','The rental has been discarded');
            }
            return back()->with('failed','The rental failed to discard');
        }
        return back()->with('failed','The rental failed to discard');
    }
}
