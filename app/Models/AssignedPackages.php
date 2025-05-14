<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedPackages extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name','package_description', 'package_id', 'package_type', 'make_id','model_id','fuel_id','make','model','fuel','total_price','discounted_price','service_time','status'
    ];

    public function hasServices(){
    	return $this->hasMany('App\Models\service', 'package_id', 'package_id');
    }
    
    public function hasPackages(){
    	return $this->hasMany('App\Models\service', 'package_id', 'package_id');
    }
}
