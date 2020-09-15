<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traveller extends Model
{
    protected $table = 'tp_travellers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'user_id', 'booking_id', 'salutation', 'first_name', 'last_name', 'mobile_no', 'address'
    ];
}
