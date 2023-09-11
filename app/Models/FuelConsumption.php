<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelConsumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'fuel_consumed',
        'fuel_amount',
        'notes',
        'vehicle_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
