@extends('layouts.app')

@section('content')
    <h1>Persetujuan Pemesanan Kendaraan</h1>
    <form action="{{ route('reservations.approve', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Isi dengan elemen-elemen form persetujuan yang sesuai -->
        <!-- Contoh: Input status persetujuan, catatan, dll. -->
        <button type="submit" class="btn btn-primary">Setujui</button>
    </form>
    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-secondary">Kembali</a>
@endsection
