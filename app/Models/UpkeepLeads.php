<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpkeepLeads extends Model
{
    use HasFactory;
    protected $table = 'upkeep_leads';
    protected $fillable = [
       'mobile','make_name','model_name','fuel_name' ,'make_id', 'model_id', 'fuel_id', 'remark','part_not_found','lead_type',
   ];
}
