<?php

namespace App\Http\Controllers\Auth;

use App\RouteModel;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function register(Request $request){


            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|same:password_confirm',
                'role' => 'required|string'
            ]);
            if ($validator->fails()) {

                return response()->json(['error'=>$validator->errors()]);

            }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            return response()->json(1);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|',
//            'password' => 'required|string|min:6|'
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }


        $user = User::where('email', $request->email)->first();
        if((!empty($user))||(!is_null($user))){
            if(Hash::check($request->password, $user->password, [])){
                if($user->role == 'Administrator'){
                    session(['admin_email'=>$user->email, 'role'=>$user->role, 'first_name'=>$user->first_name, 'last_name'=>$user->last_name, 'id'=>$user->id]);

                    return response()->json(['code'=>1]);
                }else{
                    session(['user_email'=>$user->email, 'role'=>$user->role, 'first_name'=>$user->first_name, 'last_name'=>$user->last_name, 'id'=>$user->id]);
                    if(session()->has('anonymous_route_id')) {
                        $route_ids = session()->get('anonymous_route_id');
                        foreach ($route_ids as $key => $value) {
                            RouteModel::where('id', $value)->update(['user_id' => $user->id]);
                        }
                    }
                    session()->forget('anonymous_route_id');

                    if($request->redirect_path != ''){
                        return response()->json(['code'=>2, 'path'=>$request->redirect_path]);
                    }else{
                        return response()->json(['code'=>2]);
                    }

                }
            }else{
                return response()->json(['error'=> 'Invalid password']);
            }
        }else{
            return response()->json(['error'=>'Email does not exists']);
        }

    }

}
