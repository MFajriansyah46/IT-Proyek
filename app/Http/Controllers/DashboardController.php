<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Tenant;
use App\Models\Building;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function read(){
        $countUser = Tenant::count();
        $countRoom = Room::count();
        $countBuilding = Building::count();
        $countTotalRevenue = Transaction::where('lunas',true)->sum('biaya');
        
        return view ('dashboard',
        [
            'countUser' => $countUser,
            'countRoom' => $countRoom,
            'countBuilding' => $countBuilding,
            'countTotalRevenue' => $countTotalRevenue,
        ]);
    }
}
