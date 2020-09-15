<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function fetchUser(){
        $data = User::select('first_name', 'last_name')->get()->toArray();
        foreach($data as $key=>$value){
            print_r( $value);
        }
    }
}
