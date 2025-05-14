<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $table = 'schedule_package';
    protected $fillable = [
        'package_name','package_description','updated_at'
    ];
    
    protected $dates = ['deleted_at'];

    public function hasServices(){
    	return $this->hasMany('App\Models\service', 'package_id', 'id');
    }
    public function hasPackages(){
    	return $this->hasMany('App\Models\service', 'package_id', 'id');
    }
}
