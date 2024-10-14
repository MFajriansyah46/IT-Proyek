<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;

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
        $building->unit = $request->unit;
        $building->address = $request->address;
        $building->latitude = $request->latitude;
        $building->longitude = $request->longitude; 
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
        $building->unit = $request->unit;
        $building->address = $request->address;
        $building->latitude = $request->latitude;
        $building->longitude = $request->longitude; 
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