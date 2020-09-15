<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteModel extends Model
{
    protected $table = 'tp_routes';
    protected $fillable = [
        'route_name', 'route_title', 'user_id', 'total_price', 'start_date', 'end_date', 'total_no_of_nights', 'status','route_status', 'total_travellers', 'airport_pickup', 'vehicle_type', 'booking_status', 'cities'
    ];
}
