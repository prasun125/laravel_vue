<?php

namespace App\Http\Controllers;

use App\CityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    if (Auth::user()->role == 'Administrator') {
	    	return redirect('admin/dashboard');
	    }
	    else {
		    return view('home');
	    }
    }
    public function viewWelcome(){
        $cities = CityModel::select('id', 'city_name')->orderBy('city_name', 'ASC')->get()->toArray();
        return view('welcome-old', ['data'=>$cities]);
    }

}
