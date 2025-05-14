<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carmodels extends Model
{
    use HasFactory;
    protected $table = 'model';
    protected $fillable = [
        'model_name','model_image','make_id','car_type'
    ];
     public function fuels(){
        return $this->belongsToMany('App\Models\Fuel','model_fuel','model_id','fuel_id');
        
    }
    
}
