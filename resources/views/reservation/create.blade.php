@extends('layouts.app')

@section('content')
    <h1>Tambah Pemesanan Kendaraan</h1>
    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <!-- Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control">
        </div>
        
        <!-- Tanggal Mulai -->
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>

        <!-- Tanggal Selesai -->
        <div class="form-group">
            <label for="end_date">Tanggal Selesai</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>

        <!-- Catatan -->
        <div class="form-group">
            <label for="notes">Catatan</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>

        <!-- Admin ID Dropdown -->
        <div class="form-group">
            <label for="admin_id">Admin</label>
            <select name="admin_id" id="admin_id" class="form-control">
                <option value="">Pilih Admin</option>
                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Vehicle ID Dropdown -->
        <div class="form-group">
            <label for="vehicle_id">Vehicle</label>
            <select name="vehicle_id" id="vehicle_id" class="form-control">
                <option value="">Pilih Vehicle</option>
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Driver ID Dropdown -->
        <div class="form-group">
            <label for="driver_id">Driver</label>
            <select name="driver_id" id="driver_id" class="form-control">
                <option value="">Pilih Driver</option>
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Company ID Dropdown -->
        <div class="form-group">
            <label for="company_id">Company</label>
            <select name="company_id" id="company_id" class="form-control">
                <option value="">Pilih Company</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Office ID Dropdown -->
        <div class="form-group">
            <label for="office_id">Office</label>
            <select name="office_id" id="office_id" class="form-control">
                <option value="">Pilih Office</option>
                @foreach ($offices as $office)
                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Mine ID Dropdown -->
        <div class="form-group">
            <label for="mine_id">Mine</label>
            <select name="mine_id" id="mine_id" class="form-control">
                <option value="">Pilih Mine</option>
                @foreach ($mines as $mine)
                    <option value="{{ $mine->id }}">{{ $mine->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
