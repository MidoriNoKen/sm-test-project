@extends('layouts.app')

@section('content')
    <h1>Detail Pemesanan Kendaraan</h1>
    <p>ID: {{ $reservation->id }}</p>
    <p>Status: {{ $reservation->status }}</p>
    <p>Tanggal Mulai: {{ $reservation->start_date }}</p>
    <p>Tanggal Selesai: {{ $reservation->end_date }}</p>
    <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
