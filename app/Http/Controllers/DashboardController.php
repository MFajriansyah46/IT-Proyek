<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Tenant;
use App\Models\Building;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function read()
    {
        $countUser = Tenant::count();
        $countRoom = Room::count();
        $countBuilding = Building::count();
        $countTotalRevenue = Transaction::where('status', 1)->sum('price');
    
        // Group revenue by month and year
        $monthlyRevenue = Transaction::selectRaw('strftime("%m", created_at) as month, strftime("%Y", created_at) as year, SUM(price) as total')
            ->where('status', 1) // hanya transaksi lunas
            ->groupBy(['month', 'year'])
            ->orderBy('year')
            ->orderBy('month')
            ->get();
    
        $segments = [];
        foreach ($monthlyRevenue as $index => $data) {
            $year = $data->year;
            $nextData = $monthlyRevenue[$index + 1] ?? null;
            $nextYear = $nextData->year ?? null;
    
            $color = null;
            if ($nextYear) {
                if (($year % 2 == 0 && $nextYear % 2 != 0) || ($year % 2 != 0 && $nextYear % 2 == 0)) {
                    $color = 'rgba(255, 0, 0, 1)'; // merah
                } else {
                    $color = 'rgba(0, 0, 255, 1)'; // biru
                }
            }
    
            $segments[] = [
                'x' => $data->month . '-' . $data->year,
                'y' => $data->total,
                'color' => $color,
            ];
        }
    
        return view('dashboard', [
            'countUser' => $countUser,
            'countRoom' => $countRoom,
            'countBuilding' => $countBuilding,
            'countTotalRevenue' => $countTotalRevenue,
            'segments' => $segments, // Pastikan ini dikirim ke view
        ]);
    }    
}
