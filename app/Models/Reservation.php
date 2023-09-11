<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['status', 'start_date', 'end_date', 'notes', 'admin_id', 'vehicle_id', 'driver_id', 'company_id', 'office_id', 'mine_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function mine()
    {
        return $this->belongsTo(Mine::class);
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    public function vehicleUsageHistories()
    {
        return $this->hasMany(VehicleUsageHistory::class);
    }
}
