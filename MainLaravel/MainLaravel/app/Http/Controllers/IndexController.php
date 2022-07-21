<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\DigitalContent;
use Illuminate\Http\Request;

class IndexController extends Controller{
    
    public function index(){

        $carts = CartItem::all();

        $products = DigitalContent::all();

        return view('index' , compact('products'));
    }

    public function read_more(DigitalContent $digitalproduct){

        $carts = CartItem::where('digital_content_id' , '=' , $digitalproduct->id)->get();
        return view('read_more' , compact(['digitalproduct' , 'carts']));
    }

}
