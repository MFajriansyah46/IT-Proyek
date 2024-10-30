<?php

namespace App\Http\Controllers;

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
}
