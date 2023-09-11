<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil daftar pemesanan kendaraan
        $reservations = Reservation::with('vehicle', 'driver')->get();

        return view('admin.index', compact('reservations'));
    }

    public function create()
    {
        // Ambil daftar kendaraan yang tersedia
        $vehicles = Vehicle::where('status', 'available')->get();

        return view('admin.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'notes' => 'nullable|string',
        ]);

        // Buat pemesanan kendaraan
        Reservation::create([
            'vehicle_id' => $validatedData['vehicle_id'],
            'driver_id' => $validatedData['driver_id'],
            'admin_id' => Auth::user()->id,
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'notes' => $validatedData['notes'],
            'status' => 'pending',
        ]);

        return redirect()->route('admin.index')->with('success', 'Pemesanan kendaraan berhasil dibuat.');
    }

    public function edit(Reservation $reservation)
    {
        // Ambil daftar kendaraan yang tersedia
        $vehicles = Vehicle::where('status', 'available')->get();

        return view('admin.edit', compact('reservation', 'vehicles'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'notes' => 'nullable|string',
        ]);

        // Update pemesanan kendaraan
        $reservation->update([
            'vehicle_id' => $validatedData['vehicle_id'],
            'driver_id' => $validatedData['driver_id'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'notes' => $validatedData['notes'],
        ]);

        return redirect()->route('admin.index')->with('success', 'Pemesanan kendaraan berhasil diperbarui.');
    }

    public function destroy(Reservation $reservation)
    {
        // Hapus pemesanan kendaraan
        $reservation->delete();

        return redirect()->route('admin.index')->with('success', 'Pemesanan kendaraan berhasil dihapus.');
    }
}
