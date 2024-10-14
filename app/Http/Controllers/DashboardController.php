<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Tenant;
use App\Models\Building;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function read(){
        $countUser = Tenant::count();
        $countRoom = Room::count();
        $countBuilding = Building::count();
        
        return view ('dashboard',
        [
            'countUser' => $countUser,
            'countRoom' => $countRoom,
            'countBuilding' => $countBuilding,
        ]);
    }
}
