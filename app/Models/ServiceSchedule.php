<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_date',
        'notes',
        'vehicle_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
