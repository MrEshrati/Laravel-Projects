<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\DigitalContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class CartItemController extends Controller
{
    public function index(){

        $carts = CartItem::where('user_id' , '=' , Auth::id()) -> get();

        $counts = 0;
        $prices = 0;
        $discounts = 0;

        foreach($carts as $cart){

            $counts += $cart->count;
            $prices += $cart->price * $cart->count;
            $discounts += $cart->discount;
        }

        return view('dashboard.cart' , compact(['carts','counts','prices','discounts']));
    }

    public function add(DigitalContent $digitalContent){

        $cartItem = CartItem::where('digital_content_id' , '=' , $digitalContent -> id)
                            ->where('user_id' , '=' , Auth::id()) -> first();
                            
        if ($cartItem){
            $cartItem->count++;
            $cartItem->save();
        }else{
            $cart = new CartItem(

               [ 'price' => $digitalContent->price,
                'discount' => $digitalContent->discount,]
            );

            $user = Auth::id();
            $cart->user()->associate($user);
            $cart->digital_content()->associate($digitalContent);
            $cart->save();
        }

        return redirect()->back();
    }

    public function Decrease_Count(DigitalContent $digitalContent){

        $cart_item = CartItem::where('digital_content_id' , '=' , $digitalContent -> id)
                        ->where('user_id' , '=' , Auth::id()) -> first();

        if ($cart_item->count > 1){

            $cart_item->count--;
        }

        $cart_item->save();

        return redirect()->back();
    
    }    

    public function DeleteItem($id){

        $Item = CartItem::where('digital_content_id' , '=' , $id)
                        ->where('user_id' , '=' , Auth::id()) -> first();

        $Item->delete();

        return redirect()->back();
    }
}
