<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestRequest;
use App\Models\Language;
use App\Models\LanguageUsage;
use App\Models\Usage;
use App\Models\UserUsage;
use Database\Seeders\UserUsageSeeder;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Completion\Suggestion;

class UserController extends Controller
{

    public function saveInterests(InterestRequest $request){

        $result = $request->safe()['interests'];
        $auth = Auth::user();

        foreach ($result as $res){

            $userUse = new UserUsage([

                'user_id' => $auth->id ,
                'usage_id' => $res,
            ]);
            $userUse->save();
        }
        
        $Languages = Language::all();
        return view('home' , compact('auth' , 'Languages'));
    }

    public function Interests(){

        $auth = Auth::user();
        $allUsages = Usage::all();
        return view('Layouts.interestselect' , compact(['auth' , 'allUsages']));
    }

    public function Profile(){

        $auth = Auth::user();
        $Usage = UserUsage::where('user_id' , '=' ,  $auth->id)->get();
        $usage_id = array(); 
        $LanUsageId = array();
        $usages = array();
        $suggestedLanguages = array();
        foreach ($Usage as $usage){

            $LanUsages = LanguageUsage::where('usage_id', '=' , $usage->usage_id)->get();
            array_push($LanUsageId , $LanUsages);
            array_push($usage_id , $usage->usage_id);
        }

        foreach ($usage_id as $use_id){
            
            $Usages = Usage::where('id', '=' , $use_id)->first();
            array_push($usages , $Usages);
        }

        foreach ($LanUsageId as $useid){

            foreach ($useid as $Use){

                $Language = Language::where('id' , '=' , $Use->language_id)->first();
                
                if (count($suggestedLanguages) == 0 ){

                    array_push($suggestedLanguages , $Language);
                } else {

                    if (!in_array($Language , $suggestedLanguages)){

                        array_push($suggestedLanguages , $Language);
                    }
                }
            }
        }

        return view('Layouts.profile' , compact(['suggestedLanguages' , 'usages' , 'auth']));

    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


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
