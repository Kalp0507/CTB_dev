<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class UserReward extends Model
{
    use HasFactory;
	// use SoftDeletes;
    
    protected $table = 'UserReward';
    protected $fillable = [
       'id','reward_in_percent','min_order_price_to_get', 'max_reward_per_order','max_reward_point_to_apply','reward_status'
   	];
   	
	// protected $dates = ['deleted_at'];	
}