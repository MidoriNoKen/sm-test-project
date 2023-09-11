<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproverController extends Controller
{
    public function index()
    {
        // Ambil daftar pemesanan kendaraan yang perlu disetujui
        $reservations = Reservation::where('status', 'pending')->with('vehicle', 'driver')->get();

        return view('approver.index', compact('reservations'));
    }

    public function approve(Reservation $reservation)
    {
        // Setujui pemesanan kendaraan
        $reservation->update(['status' => 'approved']);

        return redirect()->route('approver.index')->with('success', 'Pemesanan kendaraan berhasil disetujui.');
    }

    public function reject(Reservation $reservation)
    {
        // Tolak pemesanan kendaraan
        $reservation->update(['status' => 'rejected']);

        return redirect()->route('approver.index')->with('success', 'Pemesanan kendaraan berhasil ditolak.');
    }
}
