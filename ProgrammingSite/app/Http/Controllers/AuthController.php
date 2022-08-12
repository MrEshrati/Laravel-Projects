<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller{
    
    public function Authenticate_show(){

        return view('Layouts.Auth.authentication');
    }

    public function Login(LoginRequest $request){
        
        $user = User::query() -> where('email' , '=' , $request 
        -> safe()['email_phone'])
        -> orWhere('phone' , "=" , $request -> safe()['email_phone']) -> first();
    
        if ($user){

            if (Hash::check($request -> safe()['password'], $user -> password)){

                Auth::login($user);
                return redirect() -> route(('home'));
            }
        }

        return back() -> withErrors("User Doesn't Exist");
    }

    public function Register(RegisterRequest $request){

        $data = array_merge($request -> only(['name' , 'email' , 'phone']),
        ['password' => Hash::make($request -> safe()['password'])]);

        $user = User::query()
        -> where('email' , '=' , $request -> safe()['email'])
        -> orWhere('phone' , '=' , $request -> safe()['phone']) -> first();

        if($user){
            return back() -> withErrors('user exist');
        }
        
        $user = User::create($data);
        $user->syncRoles(Role::findByName('User'));

        if($user){

            return redirect() -> route('home');
        }
    }

    public function Logout(){

        Auth::logout();
        return redirect() -> route('home');
    }
}
