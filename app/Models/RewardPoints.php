<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardPoints extends Model
{
    use HasFactory;
    protected $table = 'reward_points';
    protected $fillable = [
       'userId','orderId','points'
   ];
}
