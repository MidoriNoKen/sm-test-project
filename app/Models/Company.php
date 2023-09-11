<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'telephone', 'email'];

    // Relasi dengan Vehicle
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    // Relasi dengan Reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}