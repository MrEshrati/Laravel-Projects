<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $companies = Company::all();
        return view('companylist' , compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        return view('addcompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request){
        
        $company = Company::create($request -> safe() -> all());
        
        if ($request -> hasFile('image')){

            File::delete(File::glob(storage_path('app/public/contents/'.'cover'.$company -> id.'*')));
            $extension = $request -> file('image') -> extension();
            $save_file = $request -> file('image') -> storePubliclyAs('public/contents' , 'cover'.'.'.$company -> id.$extension); 
            
            if ($save_file){

                $company -> company_image = str_replace('public' , 'storage' , $save_file);
            }
        }

        $company -> save();

        return redirect() -> route('companies.index');
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
    public function update(CompanyRequest $request,Company $company)
    {
        $company->update($request->safe()->all());
        
        if ($request->hasFile('image')){
            File::delete(File::glob(storage_path('app/public/contents/'.'cover'.$company->id.'*')));
            $extention = $request->file('image')->extension(); 
            $save_file = $request->file('image')->storePubliclyAs('public/contents', 'cover'.$company->id.'.'.$extention);
            if ($save_file){
                $company->company_image = str_replace('public', 'storage',  $save_file);

            }
        }

        $company->save();
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Company::where('id','=',$id);
        $company->delete();
        return redirect()->route('companies.index');
    }
}
