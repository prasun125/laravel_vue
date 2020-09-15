<?php

namespace App\Http\Controllers;

use App\UserRouteAddOnModel;
use Illuminate\Http\Request;

class UserAddOnCityController extends Controller
{
    public function storeAddOnCity(Request $request){
        $destination_city_id = $request->destination;
        $route_id = $request->route_id;
        $add_on_cities = $request->add_on_city_list;
        $current_add_on_city_id = $add_on_cities[count($add_on_cities)-1];
        $check_add_on_city = UserRouteAddOnModel::where('route_id', $route_id)->where('add_on_city_id', $current_add_on_city_id)->get()->toArray();
        if(empty($check_add_on_city)) {
            $user_route_add_on_city = new UserRouteAddOnModel();
            $user_route_add_on_city->route_id = $route_id;
            $user_route_add_on_city->city_id = $destination_city_id;
            $user_route_add_on_city->add_on_city_id = $current_add_on_city_id;
            $user_route_add_on_city->priority = count($add_on_cities) - 1;
            if ($user_route_add_on_city->save()) {
                return response()->json('ok');
            } else {
                return response()->json('error');
            }
        }else{
            return response()->json('exists');
        }

    }
}
