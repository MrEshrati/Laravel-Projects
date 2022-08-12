<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\LanguageUsage;
use App\Models\Usage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller {

    public function index(){

        if (Auth::user() != null){

            $auth = Auth::user();
            $Languages = Language::all();
            return view('home' , compact(['Languages' , 'auth']));
        }

        $Languages = Language::all();
        return view('home' , compact('Languages'));
    }

    public function read_more($language){

        $Language = Language::where('id' , '=' , $language)->get();
        $Usage = LanguageUsage::where('language_id' , '=' , $language)->get();
        $Usages = Usage::all();

        if (Auth::user() != null){

            $auth = Auth::user();
            $Languages = Language::all();
            return view('readmore' , compact(['Language' , 'Usages' , 'Usage' , 'auth']));
        }

        return view('readmore' , compact(['Language' , 'Usage' , 'Usages']));
    }

}
