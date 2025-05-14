<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarPartPricing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
		'part_name', 'car_type', 'solid', 'metallic', 'pearl'
    ];

    protected $dates = ['deleted_at'];
}
