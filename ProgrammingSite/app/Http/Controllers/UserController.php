<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use App\Models\UserUsage;
use Database\Seeders\UserUsageSeeder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function Profile(){

        $auth = Auth::user();
        $Usage = UserUsage::where('user_id' , '=' ,  $auth->id)->get();
        $Usages = Usage::all();
        return view('Layouts.profile' , compact(["auth" , "Usages" , "Usage"]));
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
        //
    }
}
