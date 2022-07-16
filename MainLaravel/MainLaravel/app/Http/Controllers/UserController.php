<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $allUsers = User::all();
        $user = Auth::user();
        $roles = $user->getRoleNames();

        return view('dashboard.userlist' , compact(['allUsers' , 'user' , 'roles']));
    }


    public function create(){


        $allUsers = User::all();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $allRoles = Role::all()->pluck('name');
        return view('dashboard.createUser' , compact(['allUsers' , 'user' , 'roles' , 'allRoles']));
    }


    public function store(UserRequest $request){
        
        $data = array_merge($request -> only(['name' , 'phone' , 'email']),
        ['password' => Hash::make($request -> safe()['password'])]);

        $user = User::query()
        -> where('email' , '=' , $request -> safe()['email'])
        -> orWhere('phone' , '=' , $request -> safe()['phone']) -> first();
    
        if($user){
            return back() -> withErrors('user exist');
        }

        $user = User::create($data);
        $user->syncRoles(Role::findByName($request->safe()['role']));

        if($user){

            return redirect() -> route('users.index');
        }

        
    }


    public function show($id)
    {
        $thisUser = User::where('id' , '=' , $id)->first();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $thisRole = $thisUser->getRoleNames();
        return view('dashboard.userInfo' , compact(['thisUser' , 'user' , 'roles' , 'thisRole']));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $user = User::where('id','=',$id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
