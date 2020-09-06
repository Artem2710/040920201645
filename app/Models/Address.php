<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name',
        'area',
        'additional_information',
        'house',
        'street',
        'city',
    ];

}
