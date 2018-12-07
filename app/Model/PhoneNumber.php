<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $fillable = [
    	'country_code', 'region_code', 'national_number', 'e164_format'
    ];
}
