<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\TransactionRequest;
use App\Models\CartItem;
use App\Models\Transaction;
use App\Models\TransactionInvoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller{

    public function Pay(Transaction $transaction){

        $payment = new Payment();
        $result = $payment -> sendRequest($transaction->id , $transaction->price);
        if (isset($result->error_code)){

            $transaction->status = $result->error_code;
            $transaction->save();
        } else {

            $transaction->token = $result->id;
            $transaction->save();
            return redirect($result->link);
        }
    }

    public function callback(Request $request){
        $token = $request -> input('id');
        $transaction_id = $request -> input('order_id');
        $transaction = Transaction::where([['id' , $transaction_id] , ['token' , $token]])->first();
        if (isset($request->error_code)){

            $transaction -> status = $request->error_code;
            $transaction -> save();
            return redirect('/')->with(['message' , $request->message]);
        } else {

            $transaction -> status = $request->status;
            $transaction -> save();
            return redirect('/')->with(['message' , $request->status]);

        }

    }

    public function ShowTran($id){

        $tran = Transaction::where('id' , '=' , $id)->first();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        return view('dashboard.editTransaction' , compact(['tran' , 'user' , 'roles']));

    }

    public function userTran(){

        $transactions = Transaction::where('user_id' , '=' , Auth::user()->id)->get();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        return view('dashboard.transaction' , compact(['transactions' , 'user' , 'roles']));
    }
    public function ShowInvoice($id){

        $invoice = TransactionInvoice::where('transaction_id' , '=' , $id)->get();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $allPrice = 0;
        $allDiscount = 0;
        foreach($invoice as $inv){

            $allPrice += $inv->price;
            $allDiscount += $inv->discount;
        }
        return view('dashboard.adminInvoice' , compact(['invoice' , 'user' , 'roles' , 'allPrice' , 'allDiscount']));
    }

    public function Checkout(TransactionRequest $request){

        $transaction = Transaction::create($request -> safe() -> all());
        $transaction->user()->associate(auth()->user());
        $carts = CartItem::where('user_id' , '=' , Auth::id()) ->get();
        $prices = 0;
        $discounts = 0;
        foreach($carts as $cart){

            $transaction_invoices = new TransactionInvoice([

                'price' => $cart->price,
                'discount' => $cart->discount,
                'count' => $cart->count,
            ]);

            $transaction_invoices->transactions()->associate($transaction->id);
            $transaction_invoices->digital_content()->associate($cart->digital_content_id);
            $transaction_invoices->save();
            $cart->delete();

            $prices += $cart->price;
            $discounts += $cart->discount;
        }

        $transaction->price = $prices;
        $transaction->discount = $discounts;
        $transactionSave = $transaction->save();
        if (!$transactionSave){

            return back()->withErrors('Transaction Not Created');
        }

        $tran = Transaction::where('id' , '=' , $transaction->id)->get();
        $invoice = TransactionInvoice::where('transaction_id' , '=' , $transaction->id)->get();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $allPrice = 0;
        $allDiscount = 0;
        foreach($invoice as $inv){

            $allPrice += $inv->price;
            $allDiscount += $inv->discount;
        }
        return view('dashboard.payment' , compact(['allDiscount' , 'allPrice' , 'invoice' , 'tran' , 'user' , 'roles']));
    }

    public function AdminTransaction(User $user){

        $transactions = Transaction::where('user_id' , '=' , $user->id)->get();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        return view('dashboard.transaction' , compact(['user' , 'roles' , 'transactions']));
    }

    public function index(){
        
        $transactions = Transaction::all();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        return view('dashboard.transaction' , compact(['transactions' , 'user' , 'roles']));
    }


    public function create(){

    }


    public function store(TransactionRequest $request){
        
    }


    public function show($id){
        

    }


    public function edit($id){

        $tran = Transaction::where('id' , '=' , $id)->first();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        return view('dashboard.editTransaction' , compact(['tran' , 'user' , 'roles']));
    }


    public function update(Request $request, $id){
        //
    }


    public function destroy($id){
        $tran = Transaction::where('id','=',$id);
        $tran->delete();
        return redirect()->route('transactions.index');
    }
}
