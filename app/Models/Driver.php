<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nik',
        'address',
    ];

    // Relasi dengan VehicleUsageHistory
    public function vehicleUsageHistories()
    {
        return $this->hasMany(VehicleUsageHistory::class);
    }
}
