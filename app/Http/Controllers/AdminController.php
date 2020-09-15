<?php

namespace App\Http\Controllers;

use App\Traveller;
use Illuminate\Http\Request;
use App\User;
use App\CityModel;
use App\CityDistanceTimeModel;
use App\PriceRuleModel;
use App\Booking;
use App\RouteModel;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('authenticate');
	}
	
	public function dashboard() {
		$user = new User();
		$users = $user->get()->toArray();
		
		$cityModel = new CityModel();
		$cities = $cityModel->get()->toArray();
		
		$priceRuleModel = new PriceRuleModel();
		$priceRules = $priceRuleModel->get()->toArray();
		
		$cityDistanceTimeModel = new CityDistanceTimeModel();
		$cityDistanceTimes = $cityDistanceTimeModel->get()->toArray();
		
		$data = [];
		$data['countUsers'] = count($users);
		$data['countCities'] = count($cities);
		$data['priceRules'] = count($priceRules);
		$data['cityDistanceTimes'] = count($cityDistanceTimes);
		return view('admin.dashboard', ['data' => $data]);
	}
	
	public function addUserForm() {
		return view('admin.users.create');
	}
	
	public function saveUser(Request $request) {
		$userModel = new User();
		$users = $userModel->where('email', $request->email)->get()->toArray();
		if (empty($users)) {
			$userModel->first_name = $request->first_name;
			$userModel->last_name = $request->last_name;
			$userModel->email = $request->email;
			$userModel->password = bcrypt($request->password);
			$userModel->role = $request->role;
			$userModel->remember_token = $request->_token;
			$userModel->save();
			return redirect('admin/users')->with('status', 'You have successfully added a new user');
		}
		else {
			return redirect('admin/users')->with('error', 'Your entered email is already exists, please use different email');
		}
	}
	
    public function showUsers() {
	    $userModel = new User();
	    $users = $userModel->paginate(10)->setPath('users');
        return view('admin.users.index', ['data' => $users]);
    }
	
	public function editUserForm($userId) {
		$userModel = new User();
		$users = $userModel->where('id', $userId)->get()->toArray();
		$users = array_shift($users);
		$data = [];
		$data['user'] = $users;
		return view('admin.users.edit', ['data' => $data]);
	}
	
	public function updateUser(Request $request, $userId) {
		$userModel = new User();
		$users = $userModel->where('id', $userId)->update(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'role' => $request->role]);
		return redirect('admin/users')->with('status', 'You have successfully updated an existing user');
	}

    public function createdBookings() {
        $pagination = '';
        $created_booking = Booking::where('status', 'Created')->get()->toArray();
        foreach($created_booking as $key => $value) {
            $route_id = $value['route_id'];
            $route = RouteModel::where('id', $route_id)->first();
            $created[$value['id']]['id'] = $value['id'];
            $created[$value['id']]['title'] = $route->route_title;
            $created[$value['id']]['price'] = $route->total_price;
            $created[$value['id']]['start_date'] = $route->start_date;
            $created[$value['id']]['end_date'] = $route->end_date;
            $created[$value['id']]['travellers'] = $route->total_travellers;
            $created[$value['id']]['number_of_nights'] = $route->total_no_of_nights;

            $traveller = Traveller::where('booking_id', $value['id'])->first();
            $created[$value['id']]['name'] = $traveller->first_name.' '.$traveller->last_name;
            $created[$value['id']]['email'] = $traveller->email;
            $created[$value['id']]['mobile'] = $traveller->mobile_no;
            $created[$value['id']]['address'] = $traveller->address;
            $created[$value['id']]['status'] = $value['status'];
        }
        if(isset($created)) {
            $data = collect($created);
            $pagination = app('App\Http\Controllers\CityController')->customPaginate($data, 10)->setPath('user-defined-routes');
        }
        return view('admin.bookings.created_bookings', ['data' => $pagination]);

    }

	public function pendingBookings() {
	    $pagination = '';
        $pending_booking = Booking::whereIn('status', ['Created','Pending'])->get()->toArray();
        foreach($pending_booking as $key => $value) {
            $route_id = $value['route_id'];
            $route = RouteModel::where('id', $route_id)->first();
            $pending[$value['id']]['id'] = $value['id'];
            $pending[$value['id']]['title'] = $route->route_title;
            $pending[$value['id']]['price'] = $route->total_price;
            $pending[$value['id']]['start_date'] = $route->start_date;
            $pending[$value['id']]['end_date'] = $route->end_date;
            $pending[$value['id']]['travellers'] = $route->total_travellers;
            $pending[$value['id']]['number_of_nights'] = $route->total_no_of_nights;

            $traveller = Traveller::where('booking_id', $value['id'])->first();
            $pending[$value['id']]['name'] = $traveller->first_name.' '.$traveller->last_name;
            $pending[$value['id']]['email'] = $traveller->email;
            $pending[$value['id']]['mobile'] = $traveller->mobile_no;
            $pending[$value['id']]['address'] = $traveller->address;
            $pending[$value['id']]['status'] = $value['status'];
        }
        if(isset($pending)) {
            $data = collect($pending);
            $pagination = app('App\Http\Controllers\CityController')->customPaginate($data, 10)->setPath('user-defined-routes');
        }
        return view('admin.bookings.pending_bookings', ['data' => $pagination]);

    }

    public function confirmedBookings() {
        $pagination = '';
        $confirmed_booking = Booking::where('status', 'Confirmed')->get()->toArray();
        foreach($confirmed_booking as $key => $value) {
            $route_id = $value['route_id'];
            $route = RouteModel::where('id', $route_id)->first();
            $confirmed[$value['id']]['id'] = $value['id'];
            $confirmed[$value['id']]['title'] = $route->route_title;
            $confirmed[$value['id']]['price'] = $route->total_price;
            $confirmed[$value['id']]['start_date'] = $route->start_date;
            $confirmed[$value['id']]['end_date'] = $route->end_date;
            $confirmed[$value['id']]['travellers'] = $route->total_travellers;
            $confirmed[$value['id']]['number_of_nights'] = $route->total_no_of_nights;

            $traveller = Traveller::where('booking_id', $value['id'])->first();
            $confirmed[$value['id']]['name'] = $traveller->first_name.' '.$traveller->last_name;
            $confirmed[$value['id']]['email'] = $traveller->email;
            $confirmed[$value['id']]['mobile'] = $traveller->mobile_no;
            $confirmed[$value['id']]['address'] = $traveller->address;
            $confirmed[$value['id']]['status'] = $value['status'];
        }
        if(isset($confirmed)) {
            $data = collect($confirmed);
            $pagination = app('App\Http\Controllers\CityController')->customPaginate($data, 10)->setPath('user-defined-routes');
        }
        return view('admin.bookings.confirmed_bookings', ['data' => $pagination]);
    }

    public function completedBookings() {
        $pagination = '';
        $completed_booking = Booking::where('status', 'Completed')->get()->toArray();
        foreach($completed_booking as $key => $value) {
            $route_id = $value['route_id'];
            $route = RouteModel::where('id', $route_id)->first();
            $completed[$value['id']]['id'] = $value['id'];
            $completed[$value['id']]['title'] = $route->route_title;
            $completed[$value['id']]['price'] = $route->total_price;
            $completed[$value['id']]['start_date'] = $route->start_date;
            $completed[$value['id']]['end_date'] = $route->end_date;
            $completed[$value['id']]['travellers'] = $route->total_travellers;
            $completed[$value['id']]['number_of_nights'] = $route->total_no_of_nights;

            $traveller = Traveller::where('booking_id', $value['id'])->first();
            $completed[$value['id']]['name'] = $traveller->first_name.' '.$traveller->last_name;
            $completed[$value['id']]['email'] = $traveller->email;
            $completed[$value['id']]['mobile'] = $traveller->mobile_no;
            $completed[$value['id']]['address'] = $traveller->address;
            $completed[$value['id']]['status'] = $value['status'];
        }
        if(isset($completed)) {
            $data = collect($completed);
            $pagination = app('App\Http\Controllers\CityController')->customPaginate($data, 10)->setPath('user-defined-routes');
        }
        return view('admin.bookings.completed_bookings', ['data' => $pagination]);
    }

    public function updateBooking($id) {
	    $a=0;
	    $bookingModel = new Booking();
        $booking = $bookingModel::where('id', $id)->first()->toArray();
        if(isset($booking) && $booking['status'] == 'Confirmed') {
            $bookingModel = new Booking();
            $update_booking = $bookingModel->where('id', $id)->update(['status' => 'Completed']);
            if($update_booking) {
                return redirect('admin/bookings/confirmed');
            }
        }
    }
}
