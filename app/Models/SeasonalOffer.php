<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonalOffer extends Model
{
    use HasFactory;

protected $fillable = [		'seasonal_title', 'seasonal_icon', 'seasonal_background_image', 'serviceToRedirectId'];
}
