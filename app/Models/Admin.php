<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends Model implements Authenticatable
{
    use AuthenticableTrait;
    
    protected $guard = 'admin';
    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'password', 'role_id', 'office_id'];
    protected $hidden = ['password','remember_token'];

    // Relasi dengan Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relasi dengan Office
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    // Relasi dengan Reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'admin_id');
    }

    // Relasi dengan Approval
    public function approvals()
    {
        return $this->hasMany(Approval::class, 'user_id');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}