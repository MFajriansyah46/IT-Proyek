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
        $building = $request->validate([
            'owner_id' => 'required',
            'unit_bangunan' => 'required|max:1',
            'gambar_bangunan' => 'required|image',
            'link_gmap' => 'required',
            'alamat_bangunan' => 'required|max:255',
        ]);

        $building['token'] = Str::random(16);
        
        if($request->gambar_bangunan){
            $building['gambar_bangunan'] = $request->file('gambar_bangunan')->store('building-images');
        }
        
        Building::create($building);
        $request->session()->flash('building-add-success','Building data has been successfully added.');
        return redirect('/buildings');
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
        return redirect('/buildings')->with('deleted-building', "Building ''$building->unit_bangunan - $building->alamat_bangunan'' had been deleted.");
    }
}