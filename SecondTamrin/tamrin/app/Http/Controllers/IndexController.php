<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Game;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        $games = Game::all();
        return view('home' , compact('games'));
    }

    public function companyshow(Company $company){

        
        return view('companyshow', compact('company'));
    }

    public function gameshow(Game $game){

        $companies = Company::all();
        return view('gameshow', compact(['game','companies']));
    }
}
