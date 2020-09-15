<?php

namespace App\Http\Controllers;

use App\CityDistanceTimeModel;
use App\CityImageModel;
use App\CityModel;
use App\FileModel;
use App\RouteCityModel;
use App\RouteModel;
use App\UserRouteAddOnModel;
use App\VariablesModel;
use App\VehicleModel;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TripController extends Controller
{
	public function create(Request $request) {
		// Home page data
		$homepageData = [];
		if ($request->has('_token')) {
			$cityDetails = CityModel::where('city_name', $request->input('choose_country'))->get()->toArray();
			$cityDetails = array_shift($cityDetails);
			unset($cityDetails["country_id"]);
			unset($cityDetails["created_at"]);
			unset($cityDetails["updated_at"]);
			unset($cityDetails["attraction"]);
			unset($cityDetails["city_full_name"]);
			unset($cityDetails["nearest_address"]);
			unset($cityDetails["description"]);
			unset($cityDetails["city_data"]);
			$cityDetails['addon'] = false;
			$cityDetails['selectedAsAddOn'] = false;
			$cityDetails['selectedAsCity'] = false;
			$cityImageId = CityImageModel::where('city_id', $cityDetails["id"])->get()->toArray();
			if (!empty($cityImageId)) {
				$cityImageId = $cityImageId[0]['city_image_file_id'];
				$imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
				if (!empty($imageFile)) {
					$cityDetails['image_id'] = $cityImageId;
					$cityDetails['image'] = $imageFile[0]['file_name'];
				}
			}
			$homepageData['cityDetails'] = $cityDetails;
			$homepageData['pickupDate'] = $request->input('pickup_date');
			$homepageData['dropoffDate'] = $request->input('drop_off_date');
			$homepageData['adult'] = (int)$request->input('adult');
			$homepageData['child'] = (int)$request->input('child');
		}
		
		$suggestedDestination = CityModel::select('id', 'city_name', 'place_id', 'latitude', 'longitude', 'suggested_destination', 'priority')->orderBy('priority', 'ASC')->where('suggested_destination', 1)->get()->toArray();
		
		// Get cities from Havana depending upon distance (closer to further)
		$havanaCityId = CityModel::where('city_name', 'Havana, Cuba')->select('id')->get()->toArray();
		$havanaCityId = $havanaCityId[0]['id'];
		$closerToFurtherFromHavana = CityDistanceTimeModel::where([['city_from', $havanaCityId], ['distance', '<=', 500000]])->orderBy('distance', 'ASC')->get()->toArray();
		
		$otherCities = [];
		foreach ($closerToFurtherFromHavana as $value) {
			$city = CityModel::select('id', 'city_name', 'place_id', 'latitude', 'longitude', 'suggested_destination', 'priority')->where([['suggested_destination', 0], ['id', $value["city_to"]]])->get()->toArray();
			if (!empty($city)) {
				array_push($otherCities, $city[0]);
			}
		}
		
		$allCities = array_merge($suggestedDestination, $otherCities);

		foreach ($allCities as $index => $value) {
		    $cityImageId = CityImageModel::where('city_id', $value['id'])->get()->toArray();
		    if (!empty($cityImageId)) {
		        $cityImageId = $cityImageId[0]['city_image_file_id'];
		        $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
		        if (!empty($imageFile)) {
		            $allCities[$index]['image_id'] = $cityImageId;
		            $allCities[$index]['image'] = $imageFile[0]['file_name'];
                }
            }
			$allCities[$index]['selectedAsCity'] = false;
			$allCities[$index]['selectedAsAddOn'] = false;
		}

        $mediumVehicle = VehicleModel::select('id', 'vehicle_image_id', 'vehicle_name', 'driver_inclusion', 'description', 'passenger', 'door', 'bag', 'inclusion', 'price')->where('vehicle_name', '=', 'Medium')->get()->toArray();
        $otherVehicle = VehicleModel::select('id', 'vehicle_image_id', 'vehicle_name', 'driver_inclusion', 'description', 'passenger', 'door', 'bag', 'inclusion', 'price')->where('vehicle_name', '!=', 'Medium')->get()->toArray();
        $vehicles = array_merge($mediumVehicle, $otherVehicle);

		$fileModel = new FileModel();
		foreach ($vehicles as $index => $value) {
			$vehicles[$index]['inclusion'] = json_decode($value['inclusion'], TRUE);
			$file = $fileModel->where('id', $value['vehicle_image_id'])->get()->toArray();
			$vehicles[$index]['vehicle_image'] = $file[0]['file_name'];
		}
		foreach ($vehicles as $index => $value) {
			foreach ($value['inclusion'] as $key => $inclusion) {
				if ($inclusion == null) {
					unset($vehicles[$index]['inclusion'][$key]);
				}
			}
			$vehicles[$index]['chosen'] = false;
		}
		return view('route.create', compact('allCities', 'suggestedDestination', 'vehicles', 'homepageData'));
	}
    public function createPlan(Request $request)
    {
        $route_city_model = new RouteCityModel();
        $variable_model = new VariablesModel();
        $route_model = new RouteModel();
        $pick_up_date = '';
        $end_date = '';
        $travellers = '';
        $car = '';
        $price = $variable_model->get()->toArray();
        $cost_of_one_night = $price[0]['cost_of_one_night'];
        $airport_pickup = '';
        $total_price = 0;
        if ($request->type == 'add-destination') {
            $input = $request->data;
            $pick_up_location = $input['destination'];
            $pick_up_date = date('d-m-y');
            $end_date = date('d-m-y', strtotime($input['start_date'] . ' + ' . $input['no_of_nights'] . ' days'));
            $travellers = '0';
            $car = '';
            $airport_pickup = false;
            $total_number_of_nights = $input['no_of_nights'];
            $total_price = $cost_of_one_night * $total_number_of_nights;
//                return response()->json($input);

        } else if ($request->type == 'form-submit') {

            if($request->has('airport_pickup')){
                $airport_pickup = $request->airport_pickup;
                if($airport_pickup == 'on'){
                    $airport_pickup = 1;
                    $next_location = $request->pick_up_location;
                    $pick_up_location = 1;
                }
                else{
                    $pick_up_location = $request->pick_up_location;
                }
            }else{
                $airport_pickup = false;
                $pick_up_location = $request->pick_up_location;
	            $next_location = 0;
            }
            if($request->start_date != ''){
                $pick_up_date = $request->start_date;
            }else{
                $pick_up_date = date('d-m-y');
            }
            if(session()->has('role')){
                $user_id = session()->get('id');
            }else{
                $user_id = null;
            }
            if($request->end_date != ''){
                $end_date = $request->end_date;
            }else{
                $end_date = date('d-m-y', strtotime($pick_up_date . ' + ' . $request->no_of_nights . ' days'));
            }
            if($request->has('traveller')){
                $travellers = $request->traveller;
            }else{
                $travellers = '1';
            }
            if($request->has('vehicle')){
                $car = $request->vehicle;
            }else{
                $car = '';
            }
//            $test_date = date("Y-m-d", strtotime($pick_up_date));
//            $unix_timestamp = strtotime( str_replace('-', '/', $pick_up_date));
            $yyyy_mm_dd_1 = date("Y-m-d", strtotime($pick_up_date));
            $date1 = date_create($yyyy_mm_dd_1);
//            $date1 = date("Y-m-d", strtotime($pick_up_date));
//            $unix_timestamp = strtotime(str_replace('-', '/',$end_date));
            $yyyy_mm_dd_2 = date("Y-m-d", strtotime($end_date));
            $date2 = date_create($yyyy_mm_dd_2);
//            $date2 = date("Y-m-d", strtotime($end_date));
            $diff = date_diff($date1, $date2);
            $total_number_of_nights = $diff->format("%a");
            $total_price = $cost_of_one_night * $total_number_of_nights;
        }
        $price = $variable_model->get()->toArray();
        $cost_of_one_night = $price[0]['cost_of_one_night'];
        /*fetching the name of the city*/
        $city_name = CityModel::select('city_name')->where('id', $pick_up_location)->get()->toArray();
        $pick_up_location_name = $city_name[0]['city_name'];
        $status = 'Userdefined';
        $pick_up_location_name = $city_name[0]['city_name'];
        $no_of_city = 1;
        $distance = '0';
        $leave_same_day = false;
        if ($request->type == 'form-submit') {
            $status = 'Userdefined';
            if($request->airport_pickup){
                $total_price = $total_price + 25;
            }
            $cities_array  = array();
	        $cities_array[0]['pick_up_location'] = $pick_up_location;
	        $cities_array[0]['start_date'] = date("Y-m-d", strtotime($pick_up_date));
	        $cities_array[0]['end_date'] = date("Y-m-d", strtotime($end_date));
	        $cities_array[0]['distance'] = $distance;
	        $cities_array[0]['time'] = '0';
	        //$cities_array[0]['priority'] = $no_of_city;
	        $cities_array[0]['price'] = $total_price;
	        $cities_array[0]['leave_same_day'] = $leave_same_day;
	        $requested_city_details = CityModel::where('id', $request->pick_up_location)->get()->toArray();
	        $requested_city_details = array_shift($requested_city_details);
	        if ($requested_city_details['city_name'] == 'Havana, Cuba') {
		        $cities_array[0]['havana_added_by'] = 'first_city';
	        }
	        else {
	        	if ($request->airport_pickup == 'on') {
			        $cities_array[0]['havana_added_by'] = 'airport_pickup';
		        }
		        else {
			        $cities_array[0]['havana_added_by'] = 0;
		        }
	        }
	        
	        // When selected other city and airport pickup is checked
	        $pick_up_location_name = $pick_up_location_name . '-' . $requested_city_details['city_name'];
	        $total_price += $price[0]['cost_of_one_night'];
	        //$total_number_of_nights += 1;
	
	        $distance_between_havana_another_city = CityDistanceTimeModel::where('city_from', $pick_up_location)->where('city_to', $requested_city_details['id'])->get()->toArray();
	        $distance_between_havana_another_city = array_shift($distance_between_havana_another_city);
	        
	        $cities_array[1]['pick_up_location'] = $requested_city_details['id'];
	        $cities_array[1]['start_date'] = date("Y-m-d", strtotime($pick_up_date));
	        $cities_array[1]['end_date'] = date("Y-m-d", strtotime($end_date));
	        $cities_array[1]['distance'] = $distance_between_havana_another_city['distance'];
	        $cities_array[1]['time'] = $distance_between_havana_another_city['time'];
	        //$cities_array[1]['priority'] = $no_of_city;
	        $cities_array[1]['price'] = $total_price;
	        $cities_array[1]['leave_same_day'] = $leave_same_day;
	        
	        
	        $cities_json = json_encode($cities_array);
            $id = RouteModel::create(['route_title' => $pick_up_location_name, 'user_id' => $user_id, 'total_price' => $total_price, 'start_date' => $yyyy_mm_dd_1, 'end_date' => $yyyy_mm_dd_2, 'total_no_of_nights' => $total_number_of_nights, 'status' => $status, 'total_travellers'=>$travellers, 'vehicle_type'=>$car, 'airport_pickup'=>$airport_pickup, 'booking_status'=>'Pending', 'cities' => $cities_json]);
            $route_id = $id->id;
            $status = 'Created';
            $route_city_model->route_id = $route_id;
        } else if ($request->type == 'add-destination') {

//                return response()->json($input);
            RouteModel::where('id', $input['route_id'])->update(['route_title' => $pick_up_location_name, 'total_price' => $total_price, 'start_date' => $yyyy_mm_dd_1, 'end_date' => $yyyy_mm_dd_2, 'total_no_of_nights' => $total_number_of_nights]);
            $route_city_model->route_id = $input['route_id'];
        }
//        Save data in route city table
        $route_city_model->city_id = $pick_up_location;
        $route_city_model->price = $total_price;
        $route_city_model->distance = $distance;
        $route_city_model->status = 'Created';
        $route_city_model->no_of_city = $no_of_city;
        $route_city_model->leave_same_day = $leave_same_day;
//        $route_city_model->start_date =  date('y-m-d',strtotime( str_replace('-', '/',$pick_up_date)));
//        $route_city_model->end_date =  date('y-m-d',strtotime( str_replace('-', '/',$pick_up_date)));
        $route_city_model->start_date = date("Y-m-d", strtotime($pick_up_date));
        $route_city_model->end_date = date("Y-m-d", strtotime($end_date));
        $route_city_model->time = '0';

        if ($request->type == 'form-submit' AND ($pick_up_location != $next_location)) {

            if ($route_city_model->save()) {
                // add another city if airport pickup
                if($airport_pickup){
                    $input = array(
                        'destination'=>$next_location,
                        'no_of_nights'=>$diff->days,
                        'leave_same_day'=>false,
                        'route_id'=>$route_id,
                        'previous_city_id'=>1,
                        'start_date'=>date("Y-m-d", strtotime($pick_up_date)),
                        'end_date'=>date("Y-m-d",strtotime( $end_date)),
                        'no_of_city'=>2,
                        'previous_index'=>null,
                        'previous_end_date'=>date("Y-m-d",strtotime( $pick_up_date)),
                        'add_on_city_list'=>[],
                        'final_add_on_cities'=>[],
                    );
                    $all_places = array();
                    $all_places[0] = array(
                        'addon_id' => $next_location,
                        'city_name' => 'Havana, Cuba',
                        'start_date'=>date("Y-m-d", strtotime($pick_up_date)),
                        'end_date'=>date("Y-m-d",strtotime( $end_date)),
                        'price' => 0,
                        'distance' => 0,
                        'city_id' => 1,
                        'route_id' => $route_id,
                        'time' => '0',
                        'no_of_city' => 1,
                        'place_id' => 'ChIJ4QD2vUx3zYgRYA13Gn5NKU4',
                        'number_of_nights' => '0',
                    );
                    $city_name = CityModel::select('city_name')->where('id', $input['destination'])->get()->toArray();
                    $route_title = RouteModel::select('route_title', 'airport_pickup')->where('id', $input['route_id'])->get()->toArray();
                    $new_route_title = '';
                    $total_no_of_nights = $input['no_of_nights'];
                    $total_price = 25;
                    if(is_null($input['previous_index'])) {
                        $current_no_of_city = $input['no_of_city'];
                        $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input['previous_city_id'])->where('city_to', $input['destination'])->get()->toArray();
                        if (empty($distance_between_two_places)) {
                            $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input['destination'])->where('city_to', $input['previous_city_id'])->get()->toArray();
                        }
                        $new_route_title = $route_title[0]['route_title'] . '-' . $city_name[0]['city_name'];
                    }else{
                        $current_no_of_city = $all_places[$input['previous_index']]['no_of_city'] + 1;
                        $c = $current_no_of_city;
                        $input['end_date'] = $all_places[$input['previous_index']]['end_date'];
                        $end_date =  date("Y-m-d",strtotime( ($input['end_date'] . ' + ' . $input['no_of_nights'] . ' days')));
                        $all_places[$input['previous_index']+1]['start_date'] = $end_date;
                        if($input['previous_index'] != count($all_places)-1){
                            $count = $input['previous_index'] + 1;
                            for($i = $input['previous_index'] + 1; $i<count($all_places); $i++){
                                $all_places[$i]['no_of_city'] = ++$c;
                                $all_places[$i]['end_date'] = date("Y-m-d", strtotime($all_places[$i]['start_date'] . ' + ' . $all_places[$i]['number_of_nights'] . ' days'));
                                if($i != count($all_places)-1){
                                    $all_places[++$count]['start_date'] = $all_places[$i]['end_date'];
                                }

                            }
                            $distance_between_two_places1 = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $all_places[$input['previous_index']+1]['city_id'])->where('city_to', $input['destination'])->get()->toArray();
                            if (empty($distance_between_two_places1)) {
                                $distance_between_two_places1 = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input['destination'])->where('city_to', $all_places[$input['previous_index']+1]['city_id'])->get()->toArray();
                            }
                            if($input['destination'] == $all_places[$input['previous_index']+1]['city_id']){
                                return response()->json('exists');
                            }else{
                                $all_places[$input['previous_index']+1]['distance'] = $distance_between_two_places1[0]['distance'];
                                $all_places[$input['previous_index']+1]['time'] = $distance_between_two_places1[0]['time'];
                            }

                        }
                        $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $all_places[$input['previous_index']]['city_id'])->where('city_to', $input['destination'])->get()->toArray();
                        if (empty($distance_between_two_places)) {
                            $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input['destination'])->where('city_to', $all_places[$input['previous_index']]['city_id'])->get()->toArray();
                        }
                        for($i=0; $i<count($all_places); $i++){
                            RouteCityModel::where('city_id', $all_places[$i]['city_id'])->where('route_id', $all_places[$i]['route_id'])->update(['no_of_city'=>$all_places[$i]['no_of_city'], 'distance'=> $all_places[$i]['distance'], 'time'=> $all_places[$i]['time'], 'start_date'=>$all_places[$i]['start_date'], 'end_date'=>$all_places[$i]['end_date']]);
                            $new_route_title .= $all_places[$i]['city_name'].'-';
                            if($i == $input['previous_index']){
                                $new_route_title .= $city_name[0]['city_name'].'-';
                            }
                        }
                    }
                    $variable_model = new VariablesModel();
                    $price = $variable_model->get()->toArray();

                    $total_price = $total_price + $price[0]['cost_of_one_night'] * $input['no_of_nights'];
                    $route_city_model = new RouteCityModel();
                    $route_city_model->city_id = $input['destination'];
                    $route_city_model->price = $input['no_of_nights'] * $price[0]['cost_of_one_night'];
                    $route_city_model->distance = $distance_between_two_places[0]['distance'];
                    $route_city_model->route_id = $input['route_id'];
                    $route_city_model->status = 'Created';
                    $route_city_model->no_of_city = $current_no_of_city;
                    $route_city_model->time = $distance_between_two_places[0]['time'];
                    $route_city_model->leave_same_day = $input['leave_same_day'];
                    $route_city_model->start_date = $input['end_date'];
                    $route_city_model->end_date =  date("Y-m-d",strtotime( ($input['end_date'] . ' + ' . $input['no_of_nights'] . ' days')));
                    $new_place_end_date =  date('Y-m-d',strtotime( ($input['end_date'] . ' + ' . $input['no_of_nights'] . ' days')));
                    $route_city_model->save();
                }




//                session(['temp'=>$route_id]);
                if(session()->has('role')){
                    return redirect('modify-route/' . $route_id);
                }else{
                    if(\session()->has('anonymous_route_id')){
                        session()->push('anonymous_route_id', $route_id);
                        return redirect('modify-route/' . $route_id);
                    }else{
                        session()->put('anonymous_route_id', []);
                        session()->push('anonymous_route_id', $route_id);
                        return redirect('modify-route/' . $route_id);
                    }
                }



            }
        }else{
            if($route_city_model->save()){
                //return response()->json('ok');
	            if(session()->has('role')){
		            return redirect('modify-route/' . $route_id);
	            }else{
		            if(\session()->has('anonymous_route_id')){
			            session()->push('anonymous_route_id', $route_id);
			            return redirect('modify-route/' . $route_id);
		            }else{
			            session()->put('anonymous_route_id', []);
			            session()->push('anonymous_route_id', $route_id);
			            return redirect('modify-route/' . $route_id);
		            }
	            }

            }else{
                return response()->json('error');
            }
        }
    }
    public function modifyRoutes(){
        return view('modify-routes');
    }
    public function modifyRoute($id){
	    $uid = Session::get('id');
	    $role = Session::get('role');
	    if ($role == 'Administrator') {
		    $route = RouteModel::where('id', $id)->get()->toArray();
	    	$route = array_shift($route);
		    $route['cities'] = json_decode($route['cities'], TRUE);
	    }
	    else {
		    $route = RouteModel::where('id', $id)->get();
		    $routeCreator = $route[0]->user_id;
		    $routeStatus = $route[0]->status;
		    if ($routeCreator == 1 AND $routeStatus == 'Predefined') {
			    $route = $route->toArray();
			    $route = array_shift($route);
			    if (Session::has('role') OR Session::has('id')) {
				    $newRoute = RouteModel::create(['route_title' => $route['route_title'], 'reference_id' => $route['id'], 'user_id' => Session::get('id'), 'total_price' => $route['total_price'], 'start_date' => $route['start_date'], 'end_date' => $route['end_date'], 'total_no_of_nights' => $route['total_no_of_nights'], 'status' => 'Userdefined', 'total_travellers' => $route['total_travellers'], 'vehicle_type' => $route['vehicle_type'], 'airport_pickup' => $route['airport_pickup'], 'booking_status'=>'Pending', 'cities' => $route['cities'], 'route_name' => '']);
				    $routeId = $newRoute->id;
				    return redirect('modify-route' . '/' . $routeId);
			    }
			    else {
				    $newRoute = RouteModel::create(['route_title' => $route['route_title'], 'reference_id' => $route['id'], 'user_id' => null, 'total_price' => $route['total_price'], 'start_date' => $route['start_date'], 'end_date' => $route['end_date'], 'total_no_of_nights' => $route['total_no_of_nights'], 'status' => 'Userdefined', 'total_travellers' => $route['total_travellers'], 'vehicle_type' => $route['vehicle_type'], 'airport_pickup' => $route['airport_pickup'], 'booking_status'=>'Pending', 'cities' => $route['cities'], 'route_name' => '']);
				    $routeId = $newRoute->id;
				    return redirect('modify-route' . '/' . $routeId);
			    }
		    }
		    if (Session::has('role') OR Session::has('id')) {
			    $route = $route->where('user_id', session()->get('id'));
		    }
		    $route_array = $route->toArray();
		    $route_array[0]['cities'] = json_decode($route_array[0]['cities'], TRUE);
		    $route = $route_array[0];
	    }
	    $allCities = CityModel::select('id', 'city_name', 'place_id', 'latitude', 'longitude')->orderBy('city_name', 'ASC')->get()->toArray();
	    return view('modify-route', ['route'=>$route, 'all_cities' => $allCities]);
    }
    public function fetchRoute(Request $request){
        $route_id = $request->q;
        if(session()->has('anonymous_route_id')){
            $data = session()->get('anonymous_route_id');
            $flag = 0;
            foreach($data as $key=>$value){
                if($value == $route_id) {
                    $flag  = 1;
                    $route_details = RouteModel::where('id', $route_id)->get()->toArray();
                    $route = json_decode($route_details[0]['cities'], TRUE);
	                foreach ($route as $key => $value) {
	                	$city_details = CityModel::where('id', $value['pick_up_location'])->get()->toArray();
		                $city_name = $city_details[0]['city_name'];
		                $route[$key]['city_name'] = $city_name;
		                $route[$key]['leave_same_day'] = 0;
		                $route[$key]['city_id'] = $value['pick_up_location'];
		                $route[$key]['route_id'] = $route_id;
		                $route[$key]['place_id'] = $city_details[0]['place_id'];
		
		                $date1 = date_create($route[$key]['start_date']);
		                $date2 = date_create($route[$key]['end_date']);
		                $diff = date_diff($date1, $date2);
		                $route[$key]['number_of_nights'] = $diff->format("%a");
		
		                $route[$key]['end_date'] = date("d-m-Y", strtotime($route[$key]['end_date']));
		                if (!empty($route[$key + 1]['add_on_cities'])) {
		                	$add_on_cities = $route[$key + 1]['add_on_cities'];
			                unset($route[$key]['add_on_cities']);
			                $index = 0;
		                	foreach ($add_on_cities as $add_on_city_id => $priority) {
				                $add_on_city_details = CityModel::where('id', $add_on_city_id)->get()->toArray();
				                $add_on_city_details = array_shift($add_on_city_details);
				                
				                $add_on_city['city_id'] = $add_on_city_details['id'];
				                $add_on_city['city_name'] = $add_on_city_details['city_name'];
				                $add_on_city['place_id'] = $add_on_city_details['place_id'];
				                
				                $route[$key]['add_on_cities'][] = $add_on_city;
			                }
		                }
		                else {
			                unset($route[$key]['add_on_cities']);
		                }
	                }
                    return response()->json(['data' => $route, 'route_id' => $route_id,'route_details' => $route_details[0]['route_title'], 'total_no_of_nights' => $route_details[0]['total_no_of_nights'], 'total_price' => $route_details[0]['total_price'], 'vehicle_type' => $route_details[0]['vehicle_type'], 'start_date' => $route_details[0]['start_date'], 'end_date' => date("d-m-Y", strtotime($route_details[0]['end_date'])), 'airport_pickup'=>$route_details[0]['airport_pickup'], 'total_travellers'=>$route_details[0]['total_travellers']]);
                }else{
                    $flag = 0;
                }
            }

            if(!$flag){
                return response()->json('Wrong');
            }

        }else if(session()->has('user_email')){
            $user_id = session()->get('id');
            $route_ids = RouteModel::select('id')->where('user_id', $user_id)->get()->toArray();
            if(!empty($route_ids)) {
                for ($i = 0; $i < count($route_ids); $i++) {
                    if ($route_id == $route_ids[$i]['id']) {
                        $route_id = $route_ids[$i]['id'];
                    }
                }
            }else{
                return response()->json('Wrong');
            }
            $route = RouteCityModel::join('tp_cities', 'tp_cities.id', '=', 'tp_routes_cities.city_id')->select('tp_routes_cities.id as addon_id', 'tp_cities.city_name', 'tp_routes_cities.start_date', 'tp_routes_cities.end_date', 'tp_routes_cities.price', 'tp_routes_cities.distance', 'tp_routes_cities.leave_same_day', 'tp_routes_cities.city_id', 'tp_routes_cities.route_id', 'tp_routes_cities.time', 'tp_routes_cities.route_id', 'tp_routes_cities.no_of_city', 'tp_cities.place_id')->where('tp_routes_cities.route_id', $route_id)->orderBy('no_of_city')->get()->toArray();
            if(!empty($route)) {
                for ($i = 0; $i < count($route); $i++) {
                    $date1 = date_create($route[$i]['start_date']);
                    $date2 = date_create($route[$i]['end_date']);
                    $diff = date_diff($date1, $date2);
                    $route[$i]['number_of_nights'] = $diff->format("%a");
                }
                foreach($route as $key=>$value){
                    if($key != count($route)-1){
                        $route[$key]['add_on_cities'] = UserRouteAddOnModel::join('tp_cities','tp_user_route_addon_cities.city_id', '=','tp_cities.id')->select('tp_cities.place_id', 'tp_user_route_addon_cities.city_id','tp_cities.city_name')->where('from_route_id', $value['addon_id'])->where('to_route_id', $route[$key+1]['addon_id'])->get()->toArray();
                    }
                }
                $route_details = RouteModel::select('route_title', 'total_no_of_nights', 'total_price', 'vehicle_type', 'start_date', 'end_date', 'airport_pickup', 'total_travellers')->where('id', $route_id)->get();
                $a = RouteModel::where('id', 47)->get()->toArray();
                $b = json_decode($a[0]['cities'], TRUE);
                return response()->json(['data'=>$route, 'route_id' => $route_id, 'route_details'=>$route_details[0]['route_title'], 'total_no_of_nights'=> $route_details[0]['total_no_of_nights'], 'total_price'=>$route_details[0]['total_price'], 'vehicle_type'=>$route_details[0]['vehicle_type'], 'start_date'=>$route_details[0]['start_date'], 'end_date'=>$route_details[0]['end_date'], 'airport_pickup'=>$route_details[0]['airport_pickup'], 'total_travellers'=>$route_details[0]['total_travellers']]);
            }else{
                return response()->json('Wrong');
            }
        }else{
            return response()->json('Wrong');
        }
    }
    public function addDestination(Request $request){
        $input = $request->data;
        $all_places = $request->all_place;
        $city_name = CityModel::select('city_name')->where('id', $input['destination'])->get()->toArray();
        $route_title = RouteModel::select('route_title', 'airport_pickup')->where('id', $input['route_id'])->get()->toArray();
        $route = RouteModel::select('route_title', 'airport_pickup', 'cities')->where('id', $input['route_id'])->get()->toArray();
        $cities_array = json_decode($route[0]['cities'], TRUE);
        $new_route_title = '';
        $total_no_of_nights = $input['no_of_nights'];
        if($route_title[0]['airport_pickup']){
            $total_price = 25;
        }else {
            $total_price = 0;
        }
        if(is_null($input['previous_index'])) {
            //$current_no_of_city = $input['no_of_city'] + 1;
            $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input['previous_city_id'])->where('city_to', $input['destination'])->get()->toArray();
            if (empty($distance_between_two_places)) {
                $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input['destination'])->where('city_to', $input['previous_city_id'])->get()->toArray();
            }
            $new_route_title = $route_title[0]['route_title'] . '-' . $city_name[0]['city_name'];
        }else{
            $current_no_of_city = $all_places[$input['previous_index']]['no_of_city'] + 1;
            $c = $current_no_of_city;
            $input['end_date'] = $all_places[$input['previous_index']]['end_date'];
            $end_date =  date('y-m-d',strtotime( str_replace('-', '/',($input['end_date'] . ' + ' . $input['no_of_nights'] . ' days'))));
            $all_places[$input['previous_index']+1]['start_date'] = $end_date;
            if($input['previous_index'] != count($all_places)-1){
                $count = $input['previous_index'] + 1;
                for($i = $input['previous_index'] + 1; $i<count($all_places); $i++){
                    $all_places[$i]['no_of_city'] = ++$c;

                    $all_places[$i]['end_date'] = date('m-d-y', strtotime($all_places[$i]['start_date'] . ' + ' . $all_places[$i]['number_of_nights'] . ' days'));
                    if($i != count($all_places)-1){
                        $all_places[++$count]['start_date'] = $all_places[$i]['end_date'];
                    }

                }
                $distance_between_two_places1 = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $all_places[$input['previous_index']+1]['city_id'])->where('city_to', $input['destination'])->get()->toArray();
                if (empty($distance_between_two_places1)) {
                    $distance_between_two_places1 = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input['destination'])->where('city_to', $all_places[$input['previous_index']+1]['city_id'])->get()->toArray();
                }
                if($input['destination'] == $all_places[$input['previous_index']+1]['city_id']){
                    return response()->json('exists');
                }else{
                    $all_places[$input['previous_index']+1]['distance'] = $distance_between_two_places1[0]['distance'];
                    $all_places[$input['previous_index']+1]['time'] = $distance_between_two_places1[0]['time'];
                }

            }
            $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $all_places[$input['previous_index']]['city_id'])->where('city_to', $input['destination'])->get()->toArray();
            if (empty($distance_between_two_places)) {
                $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input['destination'])->where('city_to', $all_places[$input['previous_index']]['city_id'])->get()->toArray();
            }
            for($i=0; $i<count($all_places); $i++){
                RouteCityModel::where('city_id', $all_places[$i]['city_id'])->where('route_id', $all_places[$i]['route_id'])->update(['no_of_city'=>$all_places[$i]['no_of_city'], 'distance'=> $all_places[$i]['distance'], 'time'=> $all_places[$i]['time'], 'start_date'=>$all_places[$i]['start_date'], 'end_date'=>$all_places[$i]['end_date']]);
                $new_route_title .= $all_places[$i]['city_name'].'-';
                if($i == $input['previous_index']){
                    $new_route_title .= $city_name[0]['city_name'].'-';
                }
            }
        }
        $variable_model = new VariablesModel();
        $price = $variable_model->get()->toArray();

        $total_price = $total_price + $price[0]['cost_of_one_night'] * $input['no_of_nights'];
        for($i=0; $i< count($all_places); $i++){
            $total_no_of_nights = $total_no_of_nights + $all_places[$i]['number_of_nights'];
            $total_price = $total_price + $all_places[$i]['price'];
        }
        $route_city_model = new RouteCityModel();
        $check_place_exists = $route_city_model->where('city_id', $input['destination'])->where('route_id', $input['route_id'])->first();
        if (empty($check_place_exists)) {
            $route_city_model->city_id = $input['destination'];
            $route_city_model->price = $input['no_of_nights'] * $price[0]['cost_of_one_night'];
            $route_city_model->distance = $distance_between_two_places[0]['distance'];
            $route_city_model->route_id = $input['route_id'];
            $route_city_model->status = 'Created';
            //$route_city_model->no_of_city = $current_no_of_city;
            $route_city_model->time = $distance_between_two_places[0]['time'];
            $route_city_model->leave_same_day = $input['leave_same_day'];
            $route_city_model->start_date = date('Y-m-d',strtotime($input['end_date']));
            $route_city_model->end_date =  date('Y-m-d',strtotime(($input['end_date'] . ' + ' . $input['no_of_nights'] . ' days')));
            $new_place_end_date =  date('Y-m-d',strtotime( ($input['end_date'] . ' + ' . $input['no_of_nights'] . ' days')));
	        
            // Creating route's city details of json type
	        $destination_array = array();
	        $destination_array['pick_up_location'] = $input['destination'];
	        $destination_array['start_date'] = date('Y-m-d',strtotime($input['end_date']));
	        $destination_array['end_date'] = date('Y-m-d',strtotime(($input['end_date'] . ' + ' . $input['no_of_nights'] . ' days')));
	        $destination_array['distance'] = $distance_between_two_places[0]['distance'];
	        $destination_array['time'] = $distance_between_two_places[0]['time'];
	        //$destination_array['priority'] = $current_no_of_city;
	        $destination_array['price'] = $input['no_of_nights'] * $price[0]['cost_of_one_night'];
	        $destination_array['leave_same_day'] = $input['leave_same_day'];
	
	        foreach($input['final_add_on_cities'] as $key=>$value){
		        $destination_array['add_on_cities'][$value['city_id']]['priority'] = $value['priority'];
	        }
	        $cities_array[] = $destination_array;
	        $cities_json = json_encode($cities_array);
	        
	        if ($route_city_model->save()) {
                $route_end_date = RouteModel::select('end_date')->where('id', $input['route_id'])->get()->toArray();
                if(is_null($input['previous_index'])){
                    if(strtotime($new_place_end_date) < strtotime($route_end_date[0]['end_date'])) {
                        if (RouteModel::where('id', $input['route_id'])->update(['route_title' => $new_route_title, 'total_no_of_nights' => $total_no_of_nights, 'total_price' => $total_price, 'cities' => $cities_json])) {
                            foreach($input['final_add_on_cities'] as $key=>$value){
                                $from_city_id = RouteCityModel::select('id')->where('city_id', $value['from_city_id'])->where('route_id', $input['route_id'])->get()->toArray();
                                $to_city_id = RouteCityModel::select('id')->where('city_id', $value['to_city_id'])->where('route_id', $input['route_id'])->get()->toArray();
                                $user_add_on_cities = new UserRouteAddOnModel();
                                $user_add_on_cities->from_route_id = $from_city_id[0]['id'];
                                $user_add_on_cities->to_route_id = $to_city_id[0]['id'];
                                $user_add_on_cities->city_id = $value['city_id'];
                                $user_add_on_cities->priority = $value['priority'];
                                $user_add_on_cities->save();
                            }
                            return response()->json('success');
                        } else {
                            return response()->json('error');
                        }
                    }else{
                        if (RouteModel::where('id', $input['route_id'])->update(['route_title' => $new_route_title, 'total_no_of_nights' => $total_no_of_nights, 'total_price' => $total_price, 'end_date' => date('Y-m-d', strtotime($input['end_date'] . ' + ' . $input['no_of_nights'] . ' days')), 'cities' => $cities_json])) {
                            foreach($input['final_add_on_cities'] as $key=>$value){
                                $from_city_id = RouteCityModel::select('id')->where('city_id', $value['from_city_id'])->where('route_id', $input['route_id'])->get()->toArray();
                                $to_city_id = RouteCityModel::select('id')->where('city_id', $value['to_city_id'])->where('route_id', $input['route_id'])->get()->toArray();
                                $user_add_on_cities = new UserRouteAddOnModel();
                                $user_add_on_cities->from_route_id = $from_city_id[0]['id'];
                                $user_add_on_cities->to_route_id = $to_city_id[0]['id'];
                                $user_add_on_cities->city_id = $value['city_id'];
                                $user_add_on_cities->priority = $value['priority'];
                                $user_add_on_cities->save();
                            }
                            return response()->json('success');
                        } else {
                            return response()->json('error');
                        }
                    }
                }else{
                    if(strtotime($all_places[count($all_places)-1]['end_date']) < strtotime($route_end_date[0]['end_date'])){
                        if (RouteModel::where('id', $input['route_id'])->update(['route_title' => $new_route_title, 'total_no_of_nights'=>$total_no_of_nights, 'total_price'=>$total_price, 'cities' => $cities_json])) {
                            return response()->json('success');
                        } else {
                            return response()->json('success');
                        }
                    }else{
                        if (RouteModel::where('id', $input['route_id'])->update(['route_title' => $new_route_title, 'total_no_of_nights'=>$total_no_of_nights, 'total_price'=>$total_price, 'end_date'=> $all_places[count($all_places)-1]['end_date'], 'cities' => $cities_json])) {

                            return response()->json('success');
                        } else {
                            return response()->json('success');
                        }
                    }

                }
            } else {
                return response()->json('success');
            }
        } else {
            return response()->json('exists');
        }
    }
    public function updateRouteDetails(Request $request){
        $input = $request->all();
        $basic_price = VariablesModel::select('cost_of_one_night')->get()->toArray();
        $total_no_of_nights = 0;
        $total_price = 0;
        for($i=0; $i<count($input); $i++){
            $input[$i]['price'] = $basic_price[0]['cost_of_one_night'] * $input[$i]['number_of_nights'];
            $input[$i]['end_date'] = date('m-d-y', strtotime($input[$i]['start_date'] . ' + ' . $input[$i]['number_of_nights'] . ' days'));
            $count = $i;
            if($count != count($input)-1){
                $input[$count+1]['start_date'] = $input[$i]['end_date'];
            }
            $total_no_of_nights = $total_no_of_nights + $input[$i]['number_of_nights'];
            $total_price = $total_price + $input[$i]['price'];
        }
        foreach($input as $key=>$value){
            if(RouteCityModel::where('city_id',$value['city_id'])->where('route_id', $value['route_id'])->update(['price'=>$value['price'],'start_date'=>$value['start_date'],'end_date'=>$value['end_date'],'leave_same_day'=>$value['leave_same_day']])){
                continue;
            }else{
                return response()->json('error');
            }
        }


        $end_date = RouteModel::select('end_date')->where('id',$input[0]['route_id'])->get()->toArray();
        if(strtotime($input[count($input)-1]['end_date']) < strtotime($end_date[0]['end_date'])){
            if(RouteModel::where('id', $input[0]['route_id'])->update(['total_no_of_nights'=>$total_no_of_nights, 'total_price'=>$total_price, 'start_date'=>$input[0]['start_date']])){
                return response()->json('ok');
            }
        }else{
            if(RouteModel::where('id', $input[0]['route_id'])->update(['total_no_of_nights'=>$total_no_of_nights, 'total_price'=>$total_price, 'start_date'=>$input[0]['start_date'], 'end_date'=>$input[count($input)-1]['end_date']])){
                return response()->json('ok');
            }
        }


    }
    public function deletePlaces(Request $request){
//        dd($request);
        $input = $request->data;
        $place_index = $request->index;
        $previous_index = $request->previous_index;
        $selected_city_id = $input[$request->index]['city_id'];
        $route_id = $input[$request->index]['route_id'];
        $selected_place_start_date = $input[$request->index]['start_date'];
        //$no_of_city = $input[$request->index]['no_of_city'];
        if($place_index != count($input)-1 && $place_index != 0) {
            $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input[$place_index - 1]['city_id'])->where('city_to', $input[$place_index + 1]['city_id'])->get()->toArray();
            if (empty($distance_between_two_places)) {
                $distance_between_two_places = CityDistanceTimeModel::select('distance', 'time')->where('city_from', $input[$place_index + 1]['city_id'])->where('city_to', $input[$place_index - 1]['city_id'])->get()->toArray();
            }
            $input[$place_index + 1]['distance'] = $distance_between_two_places[0]['distance'];
            $input[$place_index + 1]['time'] = $distance_between_two_places[0]['time'];
        }
        array_splice($input, $place_index, 1);
        $total_no_of_nights = 0;
        $total_price = 0;
        if(!empty($input)) {


            $route_end_date = RouteModel::select('end_date', 'airport_pickup')->where('id', $input[0]['route_id'])->get()->toArray();
            if ($place_index == 0) {
                $input[0]['start_date'] = $selected_place_start_date;
            }
            for ($i = 0; $i < count($input); $i++) {
                $input[$i]['end_date'] = date('Y-m-d', strtotime($input[$i]['start_date'] . ' + ' . $input[$i]['number_of_nights'] . ' days'));
                $count = $i;
                if ($count != count($input) - 1) {
                    $input[$count + 1]['start_date'] = $input[$i]['end_date'];
                    //$input[$count + 1]['no_of_city'] = $input[$i]['no_of_city'] + 1;
                }
                if ($i == 0) {
                    $input[$i]['distance'] = '0';
                    $input[$i]['time'] = '0';
                    //$input[$i]['no_of_city'] = '1';
                }

                

                $total_no_of_nights = $total_no_of_nights + $input[$i]['number_of_nights'];
                $total_price = $total_price + $input[$i]['price'];
            }
	        if($route_end_date[0]['airport_pickup']){
		        $total_price += 25;
	        }
	        /*$route = RouteModel::where('id', $route_id)->get()->toArray();
			$route_cities = json_decode($route[0]['cities'], TRUE);
			foreach ($route_cities as $index => $value) {
				if ($value['pick_up_location'] == $selected_city_id) {
					$index_key = $index;
					break;
				}
			}
			array_splice($route_cities, $index_key, 1);*/
	        $route_title = '';
	        for ($i = 0; $i < count($input); $i++) {
		        if($i != count($input)-1) {
			        $route_title .= $input[$i]['city_name'].'-';
		        }
		        else {
			        $route_title .= $input[$i]['city_name'];
		        }
	        }
            /*if (RouteCityModel::where('city_id', $selected_city_id)->where('route_id', $route_id)->delete()) {
                $route_title = '';
                for ($i = 0; $i < count($input); $i++) {
                    RouteCityModel::where('city_id', $input[$i]['city_id'])->where('route_id', $input[$i]['route_id'])->update(['price' => $input[$i]['price'], 'distance' => $input[$i]['distance'], 'time' => $input[$i]['time'], 'start_date' => $input[$i]['start_date'], 'end_date' => $input[$i]['end_date'], 'no_of_city'=> $input[$i]['no_of_city']]);
                    if($i != count($input)-1){
                        $route_title .= $input[$i]['city_name'].'-';
                    }else{
                        $route_title .= $input[$i]['city_name'];
                    }
                }*/

                if(strtotime($input[count($input)-1]['end_date']) < strtotime($route_end_date[0]['end_date'])){
                    if(RouteModel::where('id', $input[0]['route_id'])->update(['route_title'=>$route_title, 'total_no_of_nights'=>$total_no_of_nights, 'total_price'=>$total_price, 'cities' => json_encode($input)])){
                        /*if(UserRouteAddOnModel::where('from_route_id', $previous_index)->where('to_route_id', $selected_city_id)->delete()){
                            return response()->json('ok');
                        }*/

                        return response()->json('ok');

                    }else{
                        return response()->json('error');
                    }
                }else{
                    if(RouteModel::where('id', $input[0]['route_id'])->update(['route_title'=>$route_title, 'total_no_of_nights'=>$total_no_of_nights, 'total_price'=>$total_price, 'end_date'=>$input[count($input)-1]['end_date'], 'cities' => json_encode($input)])){
                        return response()->json('ok');
                    }else{
                        return response()->json('error');
                    }
                }
            //}
        }/*else{
            if (RouteCityModel::where('city_id', $selected_city_id)->where('route_id', $route_id)->delete()) {
                return response()->json('ok');
            }else{
                return response()->json('error');
            }
        }*/
    }
    public function saveDetails(Request $request){

        $total_price = RouteModel::select('total_price')->where('id', $request->data[0]['route_id'])->get()->toArray();
        $price = $total_price[0]['total_price'];


        if(RouteModel::where('id', $request->data[0]['route_id'])->update(['vehicle_type'=>$request->vehicle_type, 'total_travellers'=>$request->total_travellers])){
            return response()->json('ok');
        }else{
            return response()->json('error');
        }

    }
    public function toggleAirport(Request $request, $routeId){
    	/*$route_info = RouteModel::where('id', $request->data[0]['route_id'])->get()->toArray();
	    $price = $route_info[0]['total_price'];
	    $route_cities = json_decode($route_info[0]['cities'], TRUE);*/
	    $price = $request->total_price;
        if ($request->airport_pickup) {
        	$airportPickup = 1;
            $price = $price + 25;
	
	        /*$havana_city_id = CityModel::select('id')->where('city_name', 'Havana, Cuba')->get()->toArray();
	        $havana_city_id = $havana_city_id[0]['id'];
	        $array_havana = [
		        'pick_up_location' => $havana_city_id,
		        'start_date' => $route_cities[0]['start_date'],
		        'end_date' => $route_cities[0]['end_date'],
		        'distance' => '0',
		        'time' => '0',
		        'priority' => 1,
		        'price' => 100,
		        'leave_same_day' => false,
	        ];
	        
	        $city_distance_time_model = new CityDistanceTimeModel();
	        $city_distance_time = $city_distance_time_model->where('city_from', $havana_city_id)->where('city_to', $route_cities[0]['pick_up_location'])->get()->toArray();
	
	        $route_cities[0]['distance'] = $city_distance_time[0]['distance'];
	        $route_cities[0]['time'] = $city_distance_time[0]['time'];
            array_unshift($route_cities, $array_havana);
	        $route_cities = json_encode($route_cities);
	        $new_route_title = 'Havana, Cuba-' . $route_info[0]['route_title'];
	        $total_no_of_nights = $route_info[0]['total_no_of_nights'] + 1;*/
        } else {
	        $airportPickup = 0;
            $price = $price - 25;
            
	        /*$route_cities = json_decode($route_info[0]['cities'], TRUE);
	        $route_title = $route_info[0]['route_title'];
	        $route_title = explode('Havana, Cuba-', $route_title);
	        $new_route_title = $route_title[1];
	        array_splice($route_cities, 0, 1);
	        $route_cities = json_encode($route_cities);
	        $total_no_of_nights = $route_info[0]['total_no_of_nights'] - 1;*/
        }
        if (RouteModel::where('id', $routeId)->update(['airport_pickup' => $airportPickup, 'total_price' => $price])) {
            return response()->json('ok');
        }else{
            return response()->json('error');
        }
    }
    
    public function createRoute(Request $request) {
	    $cityJsonData = [];
	    if ($request->input('airport_pickup') == 'on') {
		    $airport_pickup = 1;
	    }
	    else {
		    $airport_pickup = 0;
	    }
	    $uid = Session::get('id');
    	$cityDetails = CityModel::where('id', $request->input('start_city_id'))->get()->toArray();
	    $cityDetails = array_shift($cityDetails);
	    $routeTitle = $cityDetails['city_name'];
	    $startDate = date_create_from_format('d-m-Y', $request->input('start_date'));
	    $endDate = date_create_from_format('d-m-Y', $request->input('end_date'));
	    $totalNoOfNights = date_diff($startDate, $endDate)->format("%a");
	    $costPerNight = VariablesModel::where('name', 'cost_per_night')->get()->toArray();
	    $costPerNight = $costPerNight[0]['value'];
	    $totalPrice = ((int)$totalNoOfNights - 1) * $costPerNight;
	    $cityJsonData['city']['id'] = $cityDetails['id'];
	    $cityJsonData['city']['name'] = $cityDetails['city_name'];
	    $cityJsonData['city']['latitude'] = $cityDetails['latitude'];
	    $cityJsonData['city']['longitude'] = $cityDetails['longitude'];
	    $cityJsonData['city']['placeId'] = $cityDetails['place_id'];
	    $cityJsonData['no_of_nights'] = 0;
	    $cityJsonData['start_date'] = $request->input('start_date');
	    $cityJsonData['end_date'] = $request->input('start_date');
	    $cityJsonData['add_on_cities'] = [];
	    $cityJsonData = json_encode(array($cityJsonData));
	    $route = RouteModel::create(['route_title' => $routeTitle, 'user_id' => $uid, 'total_price' => $totalPrice, 'start_date' => date_format($startDate,'Y-m-d'), 'end_date' => date_format($endDate,'Y-m-d'), 'total_no_of_nights' => $totalNoOfNights, 'status' => 'Userdefined', 'total_travellers' => $request->input('traveller'), 'vehicle_type' => $request->input('vehicle_type'), 'airport_pickup' => $airport_pickup, 'booking_status'=>'Pending', 'cities' => $cityJsonData, 'route_name' => '']);
	    $routeId = $route->id;
	    if (Session::has('role') OR Session::has('id')) {
		    return redirect('/modify-route/' . $routeId);
	    }
	    else {
		    if (Session::has('anonymous_route_id')) {
		    	Session::push('anonymous_route_id', $routeId);
			    return redirect('/modify-route/' . $routeId);
		    }
		    else {
			    Session::put('anonymous_route_id', []);
			    Session::push('anonymous_route_id', $routeId);
			    return redirect('/modify-route/' . $routeId);
		    }
	    }
    }
	
	public function updateRoute(Request $request, $routeId) {
    	$updatedCities = $request->cities;
    	$maxIndex = max(array_keys($updatedCities));
		$newRouteTitle = $request->route_title;
		$cityData = json_encode($updatedCities);
		if (RouteModel::where('id', $routeId)->update(['route_title' => $newRouteTitle, 'start_date' => $request->start_date, 'end_date' => $request->end_date, 'cities' => $cityData, 'total_travellers' => $request->total_travellers, 'vehicle_type' => $request->vehicle_type])) {
			return response()->json('ok');
		}
		else {
			return response()->json('error');
		}
	}
	
	public function calculateDistancePriceTime($previousCityId, $currentCityId) {
		$cityDistanceTimeModel = new CityDistanceTimeModel();
		$cityDistanceTime = $cityDistanceTimeModel->where('city_from', $previousCityId)->where('city_to', $currentCityId)->get()->toArray();
		if (empty($cityDistanceTime)) {
			$cityDistanceTime = $cityDistanceTimeModel->where('city_from', $currentCityId)->where('city_to', $previousCityId)->get()->toArray();
		}
		if (!empty($cityDistanceTime)) {
			$cityDistanceTime = array_shift($cityDistanceTime);
			$distance = (int)$cityDistanceTime['distance'] / 1000;
			$time = number_format((float)((int)$cityDistanceTime['time'] / 3600), 2, '.', '');
			$price = 0;
			$costPerNight = VariablesModel::where('name', 'cost_per_night')->get()->toArray();
			$costPerNight = $costPerNight[0]['value'];
			$price = round($time) * $costPerNight;
			return response()->json(['distance' => $distance, 'time' => $time, 'price' => $price]);
		}
		else {
			return response()->json('error');
		}
    }
}
