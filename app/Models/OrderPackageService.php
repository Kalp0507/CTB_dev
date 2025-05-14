<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPackageService extends Model
{
    use HasFactory;
    protected $table = 'order_package_services';
    protected $fillable = [
       'order_service_name','order_package_id'
    ];
}