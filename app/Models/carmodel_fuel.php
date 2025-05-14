<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fuel;

class carmodel_fuel extends Model
{
    use HasFactory;
    protected $table = 'model_fuel';
    protected $fillable = [
       'id','model_id','fuel_id'    
   ];
   	public function getfuels(){
    	return $this->belongsToMany('App\Models\Fuel', 'model_fuel', 'model_id', 'fuel_id');
    }
}
