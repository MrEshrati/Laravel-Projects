<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestRequest;
use App\Http\Requests\UserRequest;
use App\Models\Language;
use App\Models\LanguageUsage;
use App\Models\Usage;
use App\Models\User;
use App\Models\UserUsage;
use Database\Seeders\UserUsageSeeder;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Completion\Suggestion;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    public function saveEditInterests(InterestRequest $request){

        $auth = Auth::user();
        $Interests = UserUsage::where('user_id', '=', $auth->id)->get();
        foreach ($Interests as $Interest) {

            $Interest->delete();
        }

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
    public function saveInterests(InterestRequest $request){

        $auth = Auth::user();
        $Interests = UserUsage::where('user_id', '=', $auth->id)->get();

        if ($Interests->count() != 0){

            foreach ($Interests as $Interest) {
    
                $Interest->delete();
            }

        }

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

    public function editInterests(){

        $interest_id = array();
        $auth = Auth::user();
        $allUsages = Usage::all();
        $Interests = UserUsage::where('user_id', '=', $auth->id)->get();
        foreach ($Interests as $Interest) {

            array_push($interest_id, $Interest->usage_id);
        }
        return view('Layouts.editInterests' , compact(['allUsages' , 'auth' , 'interest_id']));
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

        if (count($suggestedLanguages) == 0){

            $allUsages = Usage::all();
            return view('Layouts.interestselect' , compact(['auth' , 'allUsages']));
        } else {

            return view('Layouts.profile' , compact(['suggestedLanguages' , 'usages' , 'auth']));

        }

    }

    public function index(){

        $allUsers = User::all();

        return view('Layouts.Dashboard.userindex' , compact('allUsers'));
    }

    public function create(){

        $auth = Auth::user();

        if ($auth->getRoleNames()[0] === 'Admin' || $auth->getRoleNames()[0] === 'CEO'){

            $allRoles = Role::all()->pluck('name');
            $user = Auth::user();
            $role = $user->getRoleNames();
            return view('Layouts.Dashboard.createuser' , compact(['allRoles' , 'role' , 'user']));
        } else {

            return redirect()->route('home');
        }
    }


    public function store(UserRequest $request)
    {
        $data = array_merge($request -> only(['name' , 'phone' , 'email']),
        ['password' => Hash::make($request -> safe()['password'])]);

        $user = User::query()
        -> where('email' , '=' , $request -> safe()['email'])
        -> orWhere('phone' , '=' , $request -> safe()['phone']) -> first();
    
        if($user){
            return back() -> withErrors('user exist');
        }

        $user = User::create($data);
        $user->syncRoles(Role::findByName($request->safe()['role']));

        if($user){

            return redirect() -> route('user.index');
        }
    }

    public function show($id){
        
        $thisUser = User::where('id' , '=' , $id)->first();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $thisRole = $thisUser->getRoleNames();
        return view('Layouts.Dashboard.userinfo' , compact(['thisUser' , 'user' , 'roles' , 'thisRole']));

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id){
        
        $user = User::where('id','=',$id);
        $user->delete();
        return redirect()->route('user.index');

    }
}
