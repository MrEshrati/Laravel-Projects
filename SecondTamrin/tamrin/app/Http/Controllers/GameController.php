<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Company;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('gamelist' , compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('addgame' , compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request){
        
        $game = Game::create($request -> safe() -> all());
        $game -> Company() -> associate($request -> safe()['company']);

        if ($request -> hasFile('image')){

            File::delete(File::glob(storage_path('app/public/contents/'.'cover'.$game -> id.'*')));
            $extension = $request -> file('image') -> extension();
            $save_file = $request -> file('image') -> storePubliclyAs('public/contents' , 'cover'.'.'.$game -> id.$extension); 
            
            if ($save_file){

                $game -> game_image = str_replace('public' , 'storage' , $save_file);
            }
        }

        $game -> save();

        return redirect() -> route('games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request,Game $game)
    {
        $game->update($request->safe()->all());
        $game -> Company() -> associate($request -> safe()['company']);
        
        if ($request->hasFile('image')){
            File::delete(File::glob(storage_path('app/public/contents/'.'cover'.$game->id.'*')));
            $extention = $request->file('image')->extension(); 
            $save_file = $request->file('image')->storePubliclyAs('public/contents', 'cover'.$game->id.'.'.$extention);
            if ($save_file){
                $game->company_image = str_replace('public', 'storage',  $save_file);
            }
        }

        $game->save();
        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::where('id','=',$id);
        $game->delete();
        return redirect()->route('games.index');
    }
}
