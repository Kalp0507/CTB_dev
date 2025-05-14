<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInformation extends Model
{
    use HasFactory;
    protected $table = 'order_information';
    protected $fillable = [
        'id','user_id','mobile','final_cost','total_cost','discount_cost','discount_perc','promo_code','promo_id','paymentType','paymentId','reward','reward_points_earned','updated_cost'
    ];

    public function hasOrderInformation(){
    	return $this->hasMany('App\Models\OrderPackageInformation', 'order_id', 'id');
    }
}