<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralLead extends Model
{
    use HasFactory;
	use SoftDeletes;
    
    protected $table = 'general_lead';
    protected $fillable = [
       'user_id','mobile','leadType', 'mature_status'
   	];
   	
	protected $dates = ['deleted_at'];	
}


