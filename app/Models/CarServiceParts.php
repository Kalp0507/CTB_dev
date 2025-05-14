<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarServiceParts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
		'part_name','part_description','part_image','make', 'model', 'fuel', 'make_id', 'model_id', 'fuel_id','image', 'price','serviceType','part_type'
    ];

    protected $dates = ['deleted_at'];
}
