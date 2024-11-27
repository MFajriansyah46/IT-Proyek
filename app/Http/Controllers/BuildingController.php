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
        $this->b = $building->all();
    }

    public function read()
    {
        return view('building.buildings', ['buildings' => $this->b]);
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

        $validated['token'] = Str::random(16);

        $gambarPath = $request->file('gambar_bangunan')->store('building-images');

        $this->b->create($validated);

        $request->session()->flash('building-add-success', 'Building data has been successfully added.');
        
        return redirect('/buildings');
    }

    public function edit($token)
    {
        return view('building.editBuilding', ['building' => $this->b->where('token', $token)->first()]);
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

        $this->b->firstWhere('token', $request->token)->update($validated);

        return redirect('/buildings')->with('success', 'Bangunan berhasil diperbarui.');
    }

    public function delete(Request $request)
    {
        $b = $this->b->firstWhere('token', $request->token)->delete();

        return redirect('/buildings')->with('deleted-building', "Building ''$b->unit_bangunan - $b->alamat_bangunan'' had been deleted.");
    }
}
