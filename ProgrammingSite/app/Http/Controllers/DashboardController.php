<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function Index(){

        $auth = Auth::user();

        if ($auth->getRoleNames()[0] === 'Admin'|| $auth->getRoleNames()[0] === 'CEO'){

            return view('Layouts.Dashboard.dashboardindex');
        } else {

            return redirect()->route('home');
        }

    }
}
