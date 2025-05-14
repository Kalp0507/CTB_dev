<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarageRequests extends Model
{
    use HasFactory;
    protected $table = 'garage_request';
    protected $fillable = [
     			'name','address','mobile','email','status','note'
    ];
}
