<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentalForm extends Model
{
    use HasFactory;
	protected $table = 'confirm_accidental_booking';
    protected $fillable = [
        'brand','model','fuel','leadType','image','parts_to_repair','car_type','remark','insurance_claim_type','insurance_company'
    ];
}