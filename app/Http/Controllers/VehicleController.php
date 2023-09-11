<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class VehicleController extends Controller
{
    // Menampilkan daftar kendaraan
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    // Menampilkan form tambah kendaraan
    public function create()
    {
        return view('vehicles.create');
    }

    // Menyimpan kendaraan baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        // Simpan kendaraan baru ke database
        $vehicle = new Vehicle();
        $vehicle->name = $request->name;
        $vehicle->type = $request->type;
        // tambahkan logika penyimpanan lainnya
        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan');
    }

    // Menampilkan detail kendaraan
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }

    // Menampilkan form edit kendaraan
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    // Mengupdate kendaraan
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        // Update kendaraan dalam database
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->name = $request->name;
        $vehicle->type = $request->type;
        // tambahkan logika update lainnya
        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil diperbarui');
    }

    // Menghapus kendaraan
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil dihapus');
    }
}
