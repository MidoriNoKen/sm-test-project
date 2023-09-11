<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Admin;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Company;
use App\Models\Office;
use App\Models\Mine;

class ReservationController extends Controller
{
    // Menampilkan daftar pemesanan
    public function index()
    {
        $reservations = Reservation::all();
        $admins = Admin::all();
        return view('reservation.index', compact('reservations', 'admins'));
    }

    // Menampilkan form tambah pemesanan
    public function create()
    {
        $admins = Admin::all();
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $companies = Company::all();
        $offices = Office::all();
        $mines = Mine::all();
        
        return view('reservation.create', compact('admins', 'vehicles', 'drivers', 'companies', 'offices', 'mines'));
    }

    // Menyimpan pemesanan baru
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'status' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'notes' => 'nullable|string',
            'admin_id' => 'required|exists:admins,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'company_id' => 'required|exists:companies,id',
            'office_id' => 'required|exists:offices,id',
            'mine_id' => 'required|exists:offices,id',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Buat objek pemesanan baru dan isi dengan data dari form
        $reservation = new Reservation([
            'status' => $request->input('status'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'notes' => $request->input('notes'),
            'admin_id' => $request->input('admin_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'driver_id' => $request->input('driver_id'),
            'company_id' => $request->input('company_id'),
            'office_id' => $request->input('office_id'),
            'mine_id' => $request->input('mine_id'),
            // Isi data lain sesuai kebutuhan
        ]);

        // Simpan pemesanan ke dalam database
        $reservation->save();

        // Redirect ke halaman daftar pemesanan dengan pesan sukses
        return redirect()->route('reservation.index')
            ->with('success', 'Pemesanan berhasil disimpan.');
    }

    // Menampilkan form edit pemesanan
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $admins = Admin::all();
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $companies = Company::all();
        $offices = Office::all();
        $mines = Mine::all();

        return view('reservation.edit', compact('reservation', 'admins', 'vehicles', 'drivers', 'companies', 'offices', 'mines'));
    }

    // Memperbarui pemesanan
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'status' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'notes' => 'nullable|string',
            'admin_id' => 'required|exists:admins,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'company_id' => 'required|exists:companies,id',
            'office_id' => 'required|exists:offices,id',
            'mine_id' => 'required|exists:offices,id',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Temukan pemesanan yang akan diperbarui
        $reservation = Reservation::findOrFail($id);

        // Perbarui data pemesanan
        $reservation->update([
            'status' => $request->input('status'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'notes' => $request->input('notes'),
            'admin_id' => $request->input('admin_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'driver_id' => $request->input('driver_id'),
            'company_id' => $request->input('company_id'),
            'office_id' => $request->input('office_id'),
            'mine_id' => $request->input('mine_id'),
            // Isi data lain sesuai kebutuhan
        ]);

        // Redirect kembali ke halaman detail pemesanan dengan pesan sukses
        return redirect()->route('reservation.show', $id)
            ->with('success', 'Pemesanan berhasil diperbarui.');
    }

    // Menampilkan detail pemesanan
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.show', compact('reservation'));
    }

    // Menampilkan form persetujuan pemesanan
    public function approveForm($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.approve', compact('reservation'));
    }

    // Proses persetujuan pemesanan
    public function approve(Request $request, $id)
    {
        // Logika untuk persetujuan pemesanan
        // Misalnya, Anda dapat menambahkan field 'disetujui' ke dalam tabel pemesanan
        // dan mengatur nilainya berdasarkan input dari form persetujuan.
        // Kemudian, Anda dapat mengupdate record pemesanan dengan nilai 'disetujui' yang baru.

        // Contoh logika persetujuan sederhana:
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'Approved'; // Ubah status persetujuan sesuai kebutuhan
        $reservation->save();

        // Redirect kembali ke halaman detail pemesanan dengan pesan sukses
        return redirect()->route('reservation.show', $id)
            ->with('success', 'Pemesanan telah disetujui.');
    }

    // Menghapus pemesanan
    public function destroy($id)
    {
        // Logika untuk menghapus pemesanan
        // Anda dapat menggunakan metode destroy() pada model Reservation.

        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        // Redirect ke halaman daftar pemesanan dengan pesan sukses
        return redirect()->route('reservation.index')
            ->with('success', 'Pemesanan berhasil dihapus.');
    }
}
