<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role_name'];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function approvers()
    {
        return $this->hasMany(Approver::class);
    }
}
