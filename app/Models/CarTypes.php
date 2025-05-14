<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarTypes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
		'type_name'
    ];

    protected $dates = ['deleted_at'];
}
