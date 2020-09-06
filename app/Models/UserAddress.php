<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public $timestamps = false;

    protected $table = 'user_address';

    protected $fillable = [
        'user_id',
        'address_id',
    ];

}
