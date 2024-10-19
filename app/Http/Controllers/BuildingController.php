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
        $building->owner_id = $request->owner_id;
        $building->unit_bangunan = $request->unit_bangunan;
        $building->gambar_bangunan = $request->gambar_bangunan;
        $building->link_gmap = $request->link_gmap;
        $building->alamat_bangunan = $request->alamat_bangunan;
        $building->remember_token = Str::random(16);

        if($request->gambar_bangunan){
            $building->gambar_bangunan = $request->file('gambar_bangunan')->store('building-images');
        }

        $building->save();

        return redirect('/buildings')->with('success', 'Building berhasil ditambahkan.');
    }

    public function edit($token)
    {
        $building = Building::where('token',$token)->first();

        return view('building.editBuilding', compact('building'));
    }

    public function update(Request $request)
    {
        $building = Building::where('token',$request->token)->first();
        $building->unit_bangunan = $request->unit_bangunan;
        $building->alamat_bangunan = $request->alamat_bangunan;
        $building->link_gmap = $request->link_gmap;

        if($request->gambar_bangunan){
            $building->gambar_bangunan = $request->file('gambar_bangunan')->store('gambar-bangunan-images');
        }
        $building->save();

        return redirect('/buildings')->with('success', 'Bangunan berhasil diperbarui.');
    }

    public function delete(Request $request)
    {
        $building = Building::where('token',$request->token)->first();
        $building->delete();

        return redirect('/buildings')->with('success', 'Building berhasil dihapus.');
    }
}