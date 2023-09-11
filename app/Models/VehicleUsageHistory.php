<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleUsageHistory extends Model
{
    protected $fillable = [
        'usage_date',
        'start_time',
        'end_time',
        'mileage_start',
        'mileage_end',
        'notes',
        'vehicle_id',
        'driver_id',
        'reservation_id',
    ];

    // Relasi dengan Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Relasi dengan Driver
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    // Relasi dengan Reservation
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
