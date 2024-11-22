<?php

namespace App\Http\Controllers;

use App\Models\Roommate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class RoommateController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Starting roommate creation process');
        Log::info('Files in request:', $request->allFiles()); // Log semua file yang dikirim

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $tenant = auth('tenant')->user();

        if ($tenant->roommate) {
            return back()->with('error', 'You already have a roommate');
        }

        $data = [
            'tenant_id' => $tenant->id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'profile_photo' => null
        ];

        if ($request->hasFile('profile_photo')) {
            Log::info('Profile photo found in request');

            try {
                $file = $request->file('profile_photo');
                Log::info('Original filename: ' . $file->getClientOriginalName());
                Log::info('File mime type: ' . $file->getMimeType());

                $path = $file->store('roommate-photos', 'public');
                Log::info('File stored at path: ' . $path);

                $data['profile_photo'] = $path;
            } catch (\Exception $e) {
                Log::error('Error uploading file: ' . $e->getMessage());
                Log::error($e->getTraceAsString());
                return back()->with('error', 'Failed to upload photo: ' . $e->getMessage());
            }
        } else {
            Log::info('No profile photo in request');
        }

        Log::info('Final data before creating roommate:', $data);

        try {
            $roommate = Roommate::create($data);
            Log::info('Roommate created successfully:', $roommate->toArray());
        } catch (\Exception $e) {
            Log::error('Error creating roommate: ' . $e->getMessage());
            return back()->with('error', 'Failed to create roommate');
        }

        return back()->with('success', 'Roommate added successfully');
    }
    public function delete()
    {
        $tenant = auth('tenant')->user();

        if (!$tenant->roommate) {
            return back()->with('error', 'No roommate found');
        }

        // Delete roommate photo if exists
        if ($tenant->roommate->profile_photo) {
            Storage::disk('public')->delete($tenant->roommate->profile_photo);
        }

        // Delete roommate
        $tenant->roommate->delete();

        return back();
    }

}
