<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    protected $b; // Properti untuk inisialisasi model Building

    // Konstruktor untuk inisialisasi properti
    public function __construct(Building $building)
    {
        $this->b = $building;
    }

    public function read()
    {
        $b = $this->b->all(); // Menggunakan properti inisialisasi
        return view('building.buildings', ['buildings' => $b]);
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

        $gambarPath = $request->file('gambar_bangunan')->store('building-images');

        $this->b->create([
            'owner_id' => $validated['owner_id'],
            'unit_bangunan' => $validated['unit_bangunan'],
            'gambar_bangunan' => $gambarPath,
            'link_gmap' => $validated['link_gmap'],
            'alamat_bangunan' => $validated['alamat_bangunan'],
            'token' => Str::random(16),
        ]);

        $request->session()->flash('building-add-success', 'Building data has been successfully added.');
        return redirect('/buildings');
    }

    public function edit($token)
    {
        $b = $this->b->where('token', $token)->first();
        return view('building.editBuilding', ['building' => $b]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'unit_bangunan' => 'required|max:1',
            'gambar_bangunan' => 'nullable|image',
            'link_gmap' => 'required',
            'alamat_bangunan' => 'required|max:255',
        ]);

        $b = $this->b->where('token', $request->token)->first();

        $b->unit_bangunan = $validated['unit_bangunan'];
        $b->alamat_bangunan = $validated['alamat_bangunan'];
        $b->link_gmap = $validated['link_gmap'];

        if ($request->gambar_bangunan) {
            $b->gambar_bangunan = $request->file('gambar_bangunan')->store('gambar-bangunan-images');
        }

        $b->save();

        return redirect('/buildings')->with('success', 'Bangunan berhasil diperbarui.');
    }

    public function delete(Request $request)
    {
        $b = $this->b->where('token', $request->token)->first();
        $b->delete();

        return redirect('/buildings')->with('deleted-building', "Building ''$b->unit_bangunan - $b->alamat_bangunan'' had been deleted.");
    }
}
