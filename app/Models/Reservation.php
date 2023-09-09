<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'approval_level_id',
        'status',
        'start_date',
        'end_date',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function approvalLevel()
    {
        return $this->belongsTo(ApprovalLevel::class);
    }
}
