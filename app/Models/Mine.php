<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    protected $fillable = ['name', 'address', 'telephone', 'office_id'];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}   
