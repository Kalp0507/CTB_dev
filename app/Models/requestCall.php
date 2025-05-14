<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestCall extends Model
{
    use HasFactory;
    protected $table = 'request_callback';
    protected $fillable = [
     			'name','mobile','email','leadType'
    ];
}
