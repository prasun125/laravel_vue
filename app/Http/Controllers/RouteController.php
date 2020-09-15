<?php

namespace App\Http\Controllers;

use App\CityImageModel;
use App\CityModel;
use App\Booking;
use App\Traveller;
use App\FileModel;
use App\RouteModel;
use App\RouteCityModel;
use App\VariablesModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;

class RouteController extends Controller
{
	public function index(){
        $routeModel = new RouteModel();
        $newRouteDetails = array();
        $routes = $routeModel->where('status', 'Predefined')->where('route_status', 'Active')->get()->toArray();
        foreach($routes as $key => $value) {
            $city_array = array();
            $cityImageModel = new CityImageModel();
            $fileModel = new FileModel();
            $cities = json_decode($value['cities']);
            //$city_array[] = 'Nicaro';
            foreach($cities as $city_key => $city_value) {
                $city_array[] = $city_value->city->name;
            }
            $city_id = $cities[0]->city->id;
            $cityImage = $cityImageModel::where('city_id', $city_id)->first();
            $cityImageId = $cityImage->city_image_file_id;
            $file = $fileModel::where('id', $cityImageId)->first();
            $filename = $file->file_name;
            $newRouteDetails[$value['id']]['id'] = $value['id'];
            $newRouteDetails[$value['id']]['title'] = $value['route_title'];
            $newRouteDetails[$value['id']]['route_name'] = $value['route_name'];
            $newRouteDetails[$value['id']]['image'] = $filename;
            $newRouteDetails[$value['id']]['cities'] = $city_array;
            $newRouteDetails[$value['id']]['price'] = $value['total_price'];
            $newRouteDetails[$value['id']]['night'] = $value['total_no_of_nights'];
        }
        $data = collect($newRouteDetails);
        $pagination = app('App\Http\Controllers\CityController')->customPaginate($data, 10)->setPath('all-routes');
        return view('allRoutes',['data' => $pagination]);
    }
	public function checkOut($routeId){
		$user_id = session()->get('id');
        $check_route = RouteModel::where('user_id', $user_id)->where('id', $routeId)->get()->toArray();
        $cities = json_decode($check_route[0]['cities']);
        if(!empty($check_route)) {
            if($check_route[0]['total_price'] != '0') {
                $routeCityModel = new RouteCityModel();
                $routeCities = $routeCityModel->where('route_id', $routeId)->get()->toArray();
                $cityModel = new CityModel();
                $trip = [];
                $totalCost = $check_route[0]['total_price'];
                /*foreach ($routeCities as $index => $value) {
                    $city = $cityModel->where('id', $value['city_id'])->get()->toArray();
                    $routeCities[$index]['city_name'] = $city[0]['city_name'];
                    if ($index == 0) {
                        $source = $routeCities[0]['city_name'];
                        continue;
                    } else {
                        $destination = $routeCities[$index]['city_name'];
                        $trip[$index]['trip_name'] = $source . ' to ' . $destination;
                        $source = $destination;
                        $diff = date_diff(date_create($value['end_date']), date_create($value['start_date']));
                        $trip[$index]['no_of_night'] = $diff->days;
                        $trip[$index]['price'] = $routeCities[$index]['price'];
                        $totalCost += $routeCities[$index]['price'];
                    }
                }*/
                foreach($cities as $key => $value) {
                    if($key == 0) {
                        $source = $value->city->name;
                        continue;
                    }
                    else {
                        $destination = $value->city->name;
                        $trip[$key]['trip_name'] = $source . ' to ' . $destination;
                        $source = $destination;
                    }
                }
                $data = [];
                $data['trip'] = $trip;
                $data['cost'] = $totalCost;
                $data['route_id'] = $routeId;
                $bookingModel = new Booking();
                $booking = $bookingModel::where('route_id', $routeId)->where('user_id', $user_id)->get()->toArray();
                if(empty($booking)) {
                    $booking = $bookingModel->create([
                            'route_id' => $routeId,
                            'user_id' => $user_id,
                            'status' => 'Created',
                        ]
                    );
                }
                return view('check-out', compact('data', 'booking'));
            }else{
                return redirect('modify-route/'.$check_route[0]['id']);
            }
        }else{
            return Redirect::back()->with('error', 'Wrong Route id');
        }
	}
    public function createRoute(){

        $data = CityModel::select('id', 'city_name')->get()->toArray();
        return view('create-route', ['data'=>$data]);
    }

    public function fetchPlans(){
        if(session()->has('anonymous_route_id')){
            $data = session()->get('anonymous_route_id');
            $store_plan = array();
            foreach($data as $key=>$value){
                $plans = RouteModel::where('id', $value)->take(3)->get();
                array_push($store_plan, $plans);
            }
            return response()->json(['plans'=>$store_plan, 'number_of_plans'=>count($store_plan)]);
        }else if(session()->has('role')){
            $user_id = session()->get('id');
            $plans = RouteModel::where('user_id', $user_id)->take(3)->get()->toArray();
            $stored_plans = array();
            $count = 0;
            for($i = 0; $i<count($plans); $i++){
                $stored_plans[$i][0] = $plans[$i];
            }
            return response()->json(['plans'=>$stored_plans, 'number_of_plans'=>count($plans)]);
        }else{
            return response()->json(['plans'=>[], 'number_of_plans'=> 0]);
        }
    }
    public function myPlans(){

        if(session()->has('anonymous_route_id')){

            $route_ids = session()->get('anonymous_route_id');
            $count = 0;
            foreach($route_ids as $key=>$value){
                $previous_booking[$count] = RouteModel::join('tp_routes_cities', 'tp_routes_cities.route_id', '=', 'tp_routes.id')->join('tp_cities_images', 'tp_routes_cities.city_id', 'tp_cities_images.city_id')->join('tp_files', 'tp_files.id', '=', 'tp_cities_images.city_image_file_id')->where('tp_routes.id',$value)->get()->toArray();
                $count++;
            }

//            dd($previous_booking);

            foreach ($previous_booking as $key => $value){

                foreach($value as $k=>$val){
                    $a[$val['route_id']][]=$val['file_path'];
                }
            }

            foreach($route_ids as $key=>$value){

                $previous[] = RouteModel::where('id', $value)->get()->toArray();

            }
            $count = 0;
            foreach ($a as $key => $value) {
                $previous[$count][0]['file_path'] = $value;
                $count++;
            }

            return view('my-plans', ['previous'=>[], 'upcoming'=>[], 'pending'=>$previous]);
//            dd($previous);
        }else if(session()->has('role')){
            $user_id = session()->get('id');
            $pending = array();
            $confirmed = array();
            $completed = array();
            $created = array();
            $route_model = new RouteCityModel();
            $confirmed_booking = Booking::where('user_id', $user_id)->where('status', 'Confirmed')->get()->toArray();
            $completed_booking = Booking::where('user_id', $user_id)->where('status', 'Completed')->get()->toArray();
            $pending_booking = Booking::where('user_id', $user_id)->where('status', 'Pending')->get()->toArray();
            $created_booking = Booking::where('user_id', $user_id)->where('status', 'Created')->get()->toArray();
            foreach($created_booking as $key => $value) {
                $route_id = $value['route_id'];
                $route = RouteModel::where('id', $route_id)->first();
                $created[$route_id]['id'] = $route->id;
                $created[$route_id]['title'] = $route->route_title;
                $created[$route_id]['price'] = $route->total_price;
                $created[$route_id]['date'] = $route->start_date;
                $created[$route_id]['travellers'] = $route->total_travellers;
            }
            foreach($pending_booking as $key => $value) {
                $route_id = $value['route_id'];
                $route = RouteModel::where('id', $route_id)->first();
                $pending[$route_id]['id'] = $route->id;
                $pending[$route_id]['title'] = $route->route_title;
                $pending[$route_id]['price'] = $route->total_price;
                $pending[$route_id]['date'] = $route->start_date;
                $pending[$route_id]['travellers'] = $route->total_travellers;
            }

            foreach($confirmed_booking as $key => $value) {
                $route_id = $value['route_id'];
                $route = RouteModel::where('id', $route_id)->first();
                $confirmed[$route_id]['id'] = $route->id;
                $confirmed[$route_id]['title'] = $route->route_title;
                $confirmed[$route_id]['price'] = $route->total_price;
                $confirmed[$route_id]['date'] = $route->start_date;
                $confirmed[$route_id]['travellers'] = $route->total_travellers;
            }

            foreach($completed_booking as $key => $value) {
                $route_id = $value['route_id'];
                $route = RouteModel::where('id', $route_id)->first();
                $completed[$route_id]['id'] = $route->id;
                $completed[$route_id]['title'] = $route->route_title;
                $completed[$route_id]['price'] = $route->total_price;
                $completed[$route_id]['date'] = $route->start_date;
                $completed[$route_id]['travellers'] = $route->total_travellers;
            }


            /*$previous_booking = RouteModel::join('tp_routes_cities', 'tp_routes_cities.route_id', '=', 'tp_routes.id')->join('tp_cities_images', 'tp_routes_cities.city_id', 'tp_cities_images.city_id')->join('tp_files', 'tp_files.id', '=', 'tp_cities_images.city_image_file_id')->where('tp_routes.user_id', $user_id)->where('tp_routes.start_date' , '<', date('m-d-y'))->where('tp_routes.booking_status', 'Confirmed')->get()->toArray();
            $a = [];
            foreach ($previous_booking as $key => $value){
                $a[$value['route_id']][]=$value['file_path'];
            }
            $previous = RouteModel::where('user_id', $user_id)->where('start_date' , '<', date('m-d-y'))->where('booking_status', 'Confirmed')->get()->toArray();
            $count = 0;
            foreach($a as $key=>$value){
                $previous[$count]['file_path'] = $value;
                $count++;
            }

            $upcoming_booking = RouteModel::join('tp_routes_cities', 'tp_routes_cities.route_id', '=', 'tp_routes.id')->join('tp_cities_images', 'tp_routes_cities.city_id', 'tp_cities_images.city_id')->join('tp_files', 'tp_files.id', '=', 'tp_cities_images.city_image_file_id')->where('tp_routes.user_id', $user_id)->where('tp_routes.start_date' , '=', date('m-d-y'))->where('tp_routes.booking_status', 'Confirmed')->get()->toArray();
            if(!empty($upcoming_booking)){
                foreach ($upcoming_booking as $key => $value) {
                    $b[$value['route_id']][] = $value['file_path'];
                }

            }else{
                $b = [];
            }

                $upcoming = RouteModel::where('user_id', $user_id)->where('start_date', '=', date('m-d-y'))->where('booking_status', 'Confirmed')->get()->toArray();
                $count = 0;
                foreach ($b as $key => $value) {
                    $upcoming[$count]['file_path'] = $value;
                    $count++;
                }
            $pending_booking = RouteModel::join('tp_routes_cities', 'tp_routes_cities.route_id', '=', 'tp_routes.id')->join('tp_cities_images', 'tp_routes_cities.city_id', 'tp_cities_images.city_id')->join('tp_files', 'tp_files.id', '=', 'tp_cities_images.city_image_file_id')->where('tp_routes.user_id', $user_id)->where('tp_routes.booking_status', 'Pending')->get()->toArray();

            if(!empty($pending_booking)){
                foreach ($pending_booking as $key => $value) {
                    $c[$value['route_id']][] = $value['file_path'];
                }

            }else{
                $c = [];
            }

            $pending = RouteModel::where('user_id', $user_id)->where('booking_status', 'Pending')->get()->toArray();
            $count = 0;
            foreach ($c as $key => $value) {
                $pending[$count]['file_path'] = $value;
                $count++;
            }*/

            return view('my-plans', ['created' => $created, 'pending'=>$pending, 'confirmed'=>$confirmed, 'completed'=>$completed]);
        }else{



        }
    }
    public function paymentConfirm(Request $request, $id){
        $user_id = session()->get('id');
        $bookingModel = new Booking();
        $travellerModel = new Traveller();
        $booking = $bookingModel::where('route_id', $id)->where('user_id', $user_id)->first();
        if($booking) {
            $bookingModel::where('route_id', $id)->where('user_id', $user_id)->update(['status'=>'Pending']);
        }
        else {
            $booking = $bookingModel->create([
                    'route_id' => $id,
                    'user_id' => $user_id,
                    'status' => 'Pending',
                ]
            );
        };
        $booking_id = $booking->id;
        $traveller = $travellerModel->create([
            'email' => $request->email,
            'user_id' => $user_id,
            'booking_id' => $booking->id,
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile_no' => $request->mobile,
            'address' => $request->address,
        ]);
        if(RouteModel::where('id', $id)->where('user_id', $user_id)->update(['booking_status'=>'Confirmed'])){
            return redirect('my-plans')->with('success', 'Your route has been booked');
        }else{
            return Redirect::back()->with('error', 'There is some problem. Please try again later');
        }
    }

    public function checkRoutes(){

    }

    public function showUserdefinedRoute() {
        $userRoutes = RouteModel::where('status','Userdefined')->get()->toArray();
        $data = collect($userRoutes);
        $pagination = app('App\Http\Controllers\CityController')->customPaginate($data, 10)->setPath('user-defined-routes');
        return view('admin.routes.show-route', ['data' => $pagination]);
    }

    public function showPredefinedRoute() {
        $userRoutes = RouteModel::where('status','Predefined')->get()->toArray();
        $data = collect($userRoutes);
        $pagination = app('App\Http\Controllers\CityController')->customPaginate($data, 10)->setPath('user-defined-routes');
        return view('admin.routes.predefined-route', ['data' => $pagination]);
    }

    public function addPredefinedRouteForm() {
        $cityModel = new CityModel();
        $cities = $cityModel->orderBy('city_name', 'ASC')->get()->toArray();
        return view('admin.routes.add-predefined-route-form', compact('cities'));
    }

    public function savePredefinedRoute(Request $request) {
        $route_model = new RouteModel();
        $cityModel = new CityModel();
        $city_id = $request->city;
        $city = $cityModel::where('id', $city_id)->first()->toArray();
        $airport_pickup = 0;
        $number_of_nights = $request->no_of_days;
        $route_name = $request->route_name;
        $routeTitle = $city['city_name'];
        $startDate = date('Y-m-d');
        $startDateJson = date('d-m-Y');
        $enddatetimestamp = strtotime($startDate);
        $enddatetimestampjson = strtotime($startDateJson);
        $endDate = date('Y-m-d',strtotime("+".$number_of_nights." days", $enddatetimestamp));
        $endDateJson = date('d-m-Y',strtotime("+".$number_of_nights." days", $enddatetimestampjson));
        $cityJsonData = array();
        $cityJsonData['city']['id'] = $city['id'];
        $cityJsonData['city']['name'] = $city['city_name'];
	    $cityJsonData['city']['latitude'] = $city['latitude'];
	    $cityJsonData['city']['longitude'] = $city['longitude'];
	    $cityJsonData['city']['placeId'] = $city['place_id'];
        $cityJsonData['no_of_nights'] = 0;
        $cityJsonData['start_date'] = $startDateJson;
        $cityJsonData['end_date'] = $startDateJson;
        $cityJsonData['add_on_cities'] = [];
        $cityJsonData = json_encode(array($cityJsonData));
        $route = $route_model::create(['route_name' => $route_name, 'route_title' => $routeTitle, 'total_price' => 0, 'start_date' => $startDate, 'end_date' => $endDate, 'total_no_of_nights' => $number_of_nights, 'status' => 'Predefined','total_travellers' => 1, 'vehicle_type' => 'Car', 'airport_pickup' => $airport_pickup, 'booking_status'=>'Pending','user_id'=>1, 'cities' => $cityJsonData, 'route_status'=>'Inactive']);
        if(!empty($route)) {
            $routeId = $route->id;
            return redirect('/modify-route/' . $routeId);
        }
    }

    public function updatePredefinedRoute($id, $status) {
        $routeModel = new RouteModel();
        $route = $routeModel::where('id', $id)->first()->toArray();
        if(isset($route) && $status == 'inactive') {
            $routeModel = new RouteModel();
            $update_route = $routeModel->where('id', $id)->update(['route_status' => 'Inactive']);
            if($update_route) {
                return redirect('admin/pre-defined-routes');
            }
        }
        elseif(isset($route) && $status == 'active') {
            $routeModel = new RouteModel();
            $update_route = $routeModel->where('id', $id)->update(['route_status' => 'Active']);
            if($update_route) {
                return redirect('admin/pre-defined-routes');
            }
        }

    }



}

