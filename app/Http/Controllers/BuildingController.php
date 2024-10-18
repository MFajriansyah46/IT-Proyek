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
        
        $building = new Building();
        $building->unit_bangunan = $request->unit_bangunan;
        $building->gambar_bangunan = $request->alamat_bangunan;
        $building->link_gmap = $request->link_gmap;
        $building->alamat_bangunan = $request->alamat_bangunan;
        $building->remember_token = Str::random(16);
        $building->save();

        return redirect('/buildings')->with('success', 'Building berhasil ditambahkan.');
    }

    public function edit($id_bangunan)
    {
        $building = Building::findOrFail($id_bangunan);
        return view('building.editBuilding', compact('building'));
    }

    public function update(Request $request, $id_bangunan)
    {
        $building = Building::findOrFail($id_bangunan);
        $building->unit_bangunan = $request->unit_bangunan;
        $building->link_gmap = $request->link_gmap;
        $building->alamat_bangunan = $request->alamat_bangunan;

        if($request->image){
            $building->gambar_bangunan = $request->file('image')->store('gambar-bangunan-images');
        }
        $building->save();

        return redirect('/buildings')->with('success', 'Building berhasil diperbarui.');
    }

    public function delete($id_bangunan)
    {
        $building = Building::findOrFail($id_bangunan);
        $building->delete();

        return redirect('/buildings')->with('success', 'Building berhasil dihapus.');
    }
}