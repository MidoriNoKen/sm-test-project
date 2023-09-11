@extends('layouts.app')

@section('content')
    <h1>Daftar Pemesanan Kendaraan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kendaraan</th>
                <th>Driver</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reservation->vehicle->name }}</td>
                    <td>{{ $reservation->driver->name }}</td>
                    <td>{{ $reservation->start_date }}</td>
                    <td>{{ $reservation->end_date }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>
                        <a href="{{ route('reservation.update', $reservation) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('reservation.destroy', $reservation) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('reservation.create') }}" class="btn btn-success">Tambah Pemesanan</a>
@endsection
