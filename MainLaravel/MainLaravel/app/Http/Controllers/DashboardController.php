<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();
        $roles = $user->getRoleNames();
        return view('dashboard.index' , compact(['user' , 'roles']));
    }
}
