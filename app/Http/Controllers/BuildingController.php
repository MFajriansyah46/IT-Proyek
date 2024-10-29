<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function read()
    {
        $buildings = Building::all();
        return view('building.buildings', compact('buildings'));
    }

    public function add()
    {
        return view('building.addBuilding');
    }

    public function submit(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'owner_id' => 'required|exists:owners,id', // Pastikan owner_id valid
            'unit_bangunan' => 'required|max:255',
            'gambar_bangunan' => 'required|image|max:2048', // Tambahkan batas ukuran
            'link_gmap' => 'required|url', // Pastikan format URL
            'alamat_bangunan' => 'required|max:255',
        ]);

        // Generate token acak
        $validatedData['token'] = Str::random(16);
        
        // Simpan gambar dan tambahkan path ke validated data
        if ($request->hasFile('gambar_bangunan')) {
            $validatedData['gambar_bangunan'] = $request->file('gambar_bangunan')->store('building-images', 'public');
        }
        
        // Buat dan simpan building
        Building::create($validatedData);

        // Set flash message untuk sukses
        $request->session()->flash('building-add-success', 'Building data has been successfully added.');
        return redirect('/buildings');
    }

    public function edit($token)
    {
        // Ambil building berdasarkan token
        $building = Building::where('token', $token)->firstOrFail();

        return view('building.editBuilding', compact('building'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'unit_bangunan' => 'required|max:255',
            'alamat_bangunan' => 'required|max:255',
            'link_gmap' => 'required|url',
            'gambar_bangunan' => 'nullable|image|max:2048', // Gambar bisa nullable
            'token' => 'required|exists:buildings,token' // Pastikan token valid
        ]);

        // Ambil building berdasarkan token
        $building = Building::where('token', $request->token)->firstOrFail();

        // Update fields
        $building->unit_bangunan = $validatedData['unit_bangunan'];
        $building->alamat_bangunan = $validatedData['alamat_bangunan'];
        $building->link_gmap = $validatedData['link_gmap'];

        // Simpan gambar baru jika ada
        if ($request->hasFile('gambar_bangunan')) {
            $building->gambar_bangunan = $request->file('gambar_bangunan')->store('building-images', 'public');
        }

        // Simpan perubahan ke database
        $building->save();

        return redirect('/buildings')->with('success', 'Building has been successfully updated.');
    }

    public function delete(Request $request)
    {
        // Ambil building berdasarkan token
        $building = Building::where('token', $request->token)->firstOrFail();

        // Hapus building dari database
        $building->delete();
        
        return redirect('/buildings')->with('deleted-building', "Building '$building->unit_bangunan - $building->alamat_bangunan' has been deleted.");
    }
}
