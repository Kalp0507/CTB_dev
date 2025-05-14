<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garages extends Model
{
    use HasFactory;

    protected $fillable = [
       'garage_name','garage_location','garage_contactNo','garage_description','mechanic_details','other_details','status'    
   	];
}
