<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 
        'email',
        'password',
        'mobile',
        'email_verified_at',
        'address',
        'town',
        'state',
        'country',
        'pin',
        'age',
        'profile_pic',
        'device_type',
        'google_token',
        'facebook_token',
        'token'
    ];
}
