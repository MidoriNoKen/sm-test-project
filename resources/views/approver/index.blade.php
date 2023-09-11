@extends('layouts.app')

@section('content')
    <h1>Daftar Pemesanan Kendaraan</h1>
    @if (count($reservations) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>
                            <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada pemesanan yang ditemukan.</p>
    @endif
@endsection
