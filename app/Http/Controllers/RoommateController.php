<?php

namespace App\Http\Controllers;

use App\Models\Roommate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoommateController extends Controller
{
    protected $M;
    public function __construct()
    {
        $this->M = new Roommate();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $tenant = auth('tenant')->user();

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
            $this->M->create($data);
            return back();
        } catch (\Exception $e) {
            return back();
        }

        return back();
    }

    public function delete()
    {
        $tenant = auth('tenant')->user();
        
        $tenant->roommate->delete();

        return back();
    }

}
