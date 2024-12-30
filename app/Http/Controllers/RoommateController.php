<?php

namespace App\Http\Controllers;

use App\Models\Roommate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoommateController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $tenant = auth('tenant')->user();

        if ($tenant->roommate) {
            return back();
        }

        $data = [
            'tenant_id' => $tenant->id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'profile_photo' => null
        ];
        if($request->hasFile('profile_photo')){
                $file = $request->file('profile_photo');
                $path = $file->store('roommate-photos', 'public');
                $data['profile_photo'] = $path;
        }

        try {
            Roommate::create($data);
            return back();
        } catch (\Exception $e) {
            return back();
        }

        return back();
    }

    public function delete()
    {
        $tenant = auth('tenant')->user();

        if (!$tenant->roommate) {
            return back()->with('error', 'No roommate found');
        }

        if ($tenant->roommate->profile_photo) {
            Storage::disk('public')->delete($tenant->roommate->profile_photo);
        }

        $tenant->roommate->delete();

        return back();
    }

}
