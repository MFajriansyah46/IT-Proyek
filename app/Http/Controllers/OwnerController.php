<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function  update(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|min:11',
            'rekening_number' => 'required',
            'image' => 'image|nullable',
        ]);

        if($request->image) {
            $validated['image'] = $request->file('image')->store('profile-images');
        }

        if(Owner::find(auth('owner')->user()->id)->update($validated)){
            return back()->with('success','Your profile has been updated.');
        } else {
            return back()->with('failed','Your profile failed to update.');
        }
    }
}