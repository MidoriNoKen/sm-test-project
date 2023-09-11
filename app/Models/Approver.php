<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Approver extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $guard = 'approver';
    protected $table = 'approvers';

    protected $fillable = ['name', 'email', 'password', 'position', 'role_id', 'office_id'];
    protected $hidden = ['password', 'remember_token'];

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