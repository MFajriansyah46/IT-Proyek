<?php

namespace App\Http\Controllers;

use App\Models\Roommate;
use Illuminate\Http\Request;

class RoommateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|max:2048'
        ]);

        $tenant = auth('tenant')->user();

        // Check if tenant already has a roommate
        if ($tenant->roommate) {
            return back()->with('error', 'You already have a roommate');
        }

        $data = $request->only(['name', 'phone_number']);
        $data['tenant_id'] = $tenant->id;

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('roommate-photos', 'public');
            $data['profile_photo'] = $path;
        }

        Roommate::create($data);

        return back()->with('success', 'Roommate added successfully');
    }
}
