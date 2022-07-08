<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\CartItem;
use App\Models\Transaction;
use App\Models\TransactionInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller{

    public function Checkout(){

        
    }

    public function index(){
        
        return view('dashboard.transaction');
    }


    public function create(){

    }


    public function store(TransactionRequest $request){
         
        $tran = Transaction::create($request -> safe() ->all());
        $tran -> user() -> associate(Auth::id()) -> first();
        $tran -> save();

        $carts = CartItem::where('user_id' , '=' , Auth::id()) -> get();

        $invoice = new TransactionInvoice(

            [ 'digital_content_id' => $carts,
                   ]
                );

        return redirect()-> route('cart.destroy');
    }


    public function show($id){
        

    }


    public function edit($id){
        //
    }


    public function update(Request $request, $id){
        //
    }


    public function destroy($id){
        //
    }
}
