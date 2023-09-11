@extends('layouts.app')

@section('content')
    <h1>Edit Pemesanan Kendaraan</h1>
    <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ $reservation->status }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $reservation->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Selesai:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $reservation->end_date }}" required>
        </div>
        <div class="form-group">
            <label for="notes">Catatan:</label>
            <textarea name="notes" id="notes" class="form-control">{{ $reservation->notes }}</textarea>
        </div>
        <div class="form-group">
            <label for="admin_id">Admin:</label>
            <select name="admin_id" id="admin_id" class="form-control">
                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}" {{ $admin->id == $reservation->admin_id ? 'selected' : '' }}>
                        {{ $admin->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- Tambahkan elemen-elemen form lainnya sesuai kebutuhan -->
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
