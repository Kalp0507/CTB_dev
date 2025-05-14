<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPackageInformation extends Model
{
    use HasFactory;
    protected $table = 'order_package_information';
    protected $fillable = [
        'order_id','name','mobile','pickup_date','time_of_pickup','vehical_number','payment_option','package_name','package_description','address','special_remark','total_price','service_time','package_type','status','make_id','model_id','fuel_id','car_type'
    ];
    public function getOrderInformation(){
    	return $this->belongsTo('App\Models\OrderInformation');
    }
}