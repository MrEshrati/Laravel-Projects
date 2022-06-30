<?php

namespace App\Http\Controllers;

use App\Models\DigitalContent;
use Illuminate\Http\Request;

class IndexController extends Controller{
    
    public function index(){

        $products = DigitalContent::all();

        return view('index' , compact('products'));
    }

    public function read_more(DigitalContent $digitalproduct){


        return view('read_more' , compact('digitalproduct'));
    }

}
