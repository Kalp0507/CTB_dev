<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
	protected $table = 'make';
    protected $fillable = [
        'id','make_name','make_image'
    ];


}
