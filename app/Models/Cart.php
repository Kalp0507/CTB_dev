<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'mycart';
    protected $fillable = [
        'id','pack_id','u_id','pack_price','category','part_material','car_type','part_quantity','make_id','model_id','fuel_id',
    ];
}