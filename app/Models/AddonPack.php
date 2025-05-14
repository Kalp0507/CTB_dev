<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddonPack extends Model
{
    use HasFactory;
    protected $table = 'addon_services';
    protected $fillable = [
       'id','addon_icon','addon_name','addon_description' ,'addon_price', 'category'
   ];
}
