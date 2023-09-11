<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReservationsExport;

class ReportController extends Controller
{
    public function export()
    {
        // Mengekspor laporan pemesanan kendaraan dalam format Excel
        return Excel::download(new ReservationsExport, 'reservations.xlsx');
    }
}
