<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesLeads extends Model
{
    use HasFactory;
    protected $fillable = [
       'make','model','fuel_type','name','mobileNo','leadType','serviceType','selected_parts','remark',
   	];
}
