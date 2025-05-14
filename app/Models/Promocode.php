<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;
    protected $table = 'promocode';
     protected $fillable = [
        'promocode_text','selection_type','promocode_amount','promocode_start_date','promocode_end_date','promocode_status','max_discount'
    ];			
}
