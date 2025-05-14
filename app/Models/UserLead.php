<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLead extends Model
{
    use HasFactory;
    protected $table = 'new_user_lead';

    protected $fillable = [
       'id','mobile','car_details',	'lead_type','status','created_at','updated_at',
   ];
}