<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik pemakaian kendaraan
        $vehicleStats = DB::table('reservations')
            ->select('vehicle_id', DB::raw('COUNT(*) as count'))
            ->groupBy('vehicle_id')
            ->get();

        return view('dashboard.index', compact('vehicleStats'));
    }
}
