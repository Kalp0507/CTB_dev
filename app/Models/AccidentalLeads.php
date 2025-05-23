<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentalLeads extends Model
{
    use HasFactory;
    protected $fillable = [
        'make','model','fuel','leadType','image','car_type','query','mobile'
    ];
}
