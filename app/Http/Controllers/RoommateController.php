<?php

namespace App\Http\Controllers;

use App\Models\Roommate;
use Illuminate\Http\Request;

class RoommateController extends Controller
{
    // Menampilkan formulir Add Roommate
    public function create()
    {
        return view('roommate.add'); // Pastikan Anda memiliki view untuk formulir ini
    }

    // Menyimpan roommate yang baru ditambahkan
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $roommate = new Roommate;
        $roommate->name = $request->name;
        $roommate->phone_number = $request->phone_number;

        // Menangani file foto profil jika ada
        if ($request->hasFile('profile_photo')) {
            $imagePath = $request->file('profile_photo')->store('profile_photos', 'public');
            $roommate->profile_photo_url = $imagePath;
        }

        $roommate->tenant_id = auth()->id();  // Pastikan tenant_id diisi dengan ID tenant yang sedang login
        $roommate->save();

        return redirect()->back()->with('success', 'Roommate added successfully!');
    }
}
