<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CarParts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
		'part_name','part_category'
    ];

    protected $dates = ['deleted_at'];

}
