<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatteryTyreLeads extends Model
{
    use HasFactory;

    protected $fillable = [
        'make','model','fuel','leadType','query','mobile','battery_or_tyre'
    ];
}
