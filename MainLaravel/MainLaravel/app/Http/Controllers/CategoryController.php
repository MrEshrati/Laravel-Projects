<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $categories = Category::all();
        return view('dashboard.categoryList' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        $categories = Category::all();
        return view('dashboard.createCategory' , compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request){

        $cat = Category::create($request -> safe() -> all());

        $cat -> category() -> associate($request -> safe()['parent_id']);
        
        $cat -> save();

        return redirect() -> route('categories.index');

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
    public function edit($id){

        $category = Category::find($id);
        $categories = Category::all();

        return view('dashboard.editCategory' , compact(['category' , 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request , Category $category){
    
        // dd($request->safe()->all());
        $category::where('id', $category -> id)
        ->update(["name" => $request -> safe()['name']]);
        $category -> category() -> associate($request -> safe()['parent_id']);

        $category->save();
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $product = Category::where('id','=',$id);
        $product->delete();
        return redirect()->route('categories.index');
    }
}
