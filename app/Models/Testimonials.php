<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;
    protected $table = 'testimonial';

    protected $fillable = [
       'id','client_photo','client_name','client_location','client_testimonial','client_rating','category','user_id'    
   ];
}
