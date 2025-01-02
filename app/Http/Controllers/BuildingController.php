<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    protected $b;

    public function __construct(Building $building)
    {
        $this->b = $building;
    }

    public function read()
    {
        return view('building.buildings', ['buildings' => $this->b->all()]);
    }

    public function add()
    {
        return view('building.addBuilding');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'owner_id' => 'required',
            'unit_bangunan' => 'required|max:1',
            'gambar_bangunan' => 'required|image',
            'link_gmap' => 'required',
            'alamat_bangunan' => 'required|max:255',
        ]);

        $validated['remember_token'] = Str::random(16);

        $validated['gambar_bangunan'] = $request->file('gambar_bangunan')->store('building-images');

        if($this->b->create($validated)){
            return redirect('/buildings')->with('success', 'The building has been successfully added.');
        } else {
            return redirect('/buildings')->with('failed', 'The building failed to be added.');
        }
    }

    public function edit($remember_token)
    {
        return view('building.editBuilding', ['building' => $this->b->firstWhere('remember_token', $remember_token)]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'unit_bangunan' => 'required|max:1',
            'gambar_bangunan' => 'nullable|image',
            'link_gmap' => 'required',
            'alamat_bangunan' => 'required|max:255',
        ]);

        if ($request->gambar_bangunan) {
            $validated ['gambar_bangunan'] = $request->file('gambar_bangunan')->store('gambar-bangunan-images');
        }

        if($this->b->firstWhere('remember_token', $request->remember_token)->update($validated)) {
            return redirect('/buildings')->with('success', 'The building has been successfully updated.');
        } else {
            return redirect('/buildings')->with('failed', 'The building update was fail.');
        }
    }

    public function delete(Request $request)
    {
        $building = $this->b->firstWhere('remember_token', $request->remember_token);
        if ($building) {
            // Periksa apakah building tidak memiliki relasi dengan tabel rooms
            if ($building->rooms()->exists()) {
                return redirect('/buildings')->with('failed', "The building has related rooms and cannot be deleted.");
            }
        
            // Jika tidak ada relasi dengan rooms, hapus building
            if ($building->delete()) {
                return redirect('/buildings')->with('success', "Building '{$building->unit_bangunan} - {$building->alamat_bangunan}' has been deleted.");
            } else {
                return redirect('/buildings')->with('failed', "Failed to delete the building.");
            }
        } else {
            return redirect('/buildings')->with('failed', "Building not found or deletion failed.");
        }
    }
}
