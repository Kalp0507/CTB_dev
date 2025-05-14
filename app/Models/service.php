<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class service extends Model
{
    use HasFactory;
    use SoftDeletes;

	protected $table = 'service_schedule_pack';
    protected $fillable = [
        'service_name','package_id'
    ];

    protected $dates = ['deleted_at'];

    public function pack(){
        // return $this->belongsTo('App\Models\Package');
        return $this->belongsTo('App\Models\AssignedPackages');
    }
}
