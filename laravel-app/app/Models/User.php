<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_fullname', 'user_email', 'user_password', 'user_status'];
    protected $hidden = ['user_password'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['user_password'] = Hash::make($password);
    }

    public function getAuthPassword()
    {
        return $this->user_password;
    }
}
