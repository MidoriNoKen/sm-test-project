<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleStat extends Model
{
    protected $table = 'vehicle_stats';

    protected $fillable = [
        'vehicle_id',
        'total_fuel_consumed',
        'average_fuel_consumption',
        'total_service_schedules',
        'total_usage_histories',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
