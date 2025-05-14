<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id','mobile','email','password','otp','remember_token','username','reward'
    ];

    public function packs(){
    return $this->hasMany('App\Models\Package', 'u_id', 'id');        
    }

}
