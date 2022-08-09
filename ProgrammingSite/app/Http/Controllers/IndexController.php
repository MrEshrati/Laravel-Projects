<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class IndexController extends Controller {

    public function index(){

        $Languages = Language::all();
        return view('home' , compact('Languages'));
    }

}
