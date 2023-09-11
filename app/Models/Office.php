<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name', 'address', 'telephone'];

    public function mines()
    {
        return $this->hasMany(Mine::class);
    }
}
