<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['name', 'type', 'fuel_consumption', 'service_schedule', 'company_id', 'status'];

    // Relasi dengan Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi dengan Reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Relasi dengan FuelConsumption
    public function fuelConsumptions()
    {
        return $this->hasMany(FuelConsumption::class);
    }

    // Relasi dengan ServiceSchedule
    public function serviceSchedules()
    {
        return $this->hasMany(ServiceSchedule::class);
    }

    // Relasi dengan VehicleUsageHistory
    public function vehicleUsageHistories()
    {
        return $this->hasMany(VehicleUsageHistory::class);
    }
}
