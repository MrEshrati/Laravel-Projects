<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\DigitalContent;
use App\Models\DigitalContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index(){
        
        $products = DigitalContent::all();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        return view('dashboard.productsList' , compact(['products' , 'user' , 'roles']));
    }


    public function create(){
        
        $types = DigitalContentType::all();
        $categories = Category::all();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        return view('dashboard.createProduct' , compact(['types' , 'categories' , 'user' , 'roles']));
    }

    public function store(ProductRequest $request){
        
        $product = DigitalContent::create($request -> safe() -> all());

        $product -> digital_content_type() -> associate($request -> safe()['type']);
        $product -> category() -> sync(explode(',' , $request -> category));

        if ($request -> hasFile('image')){

            File::delete(File::glob(storage_path('app/public/contents/'.'cover'.$product -> id.'*')));
            $extension = $request -> file('image') -> extension();
            $save_file = $request -> file('image') -> storePubliclyAs('public/contents' , 'cover'.'.'.$product -> id.$extension); 
            
            if ($save_file){

                $product -> image_url = str_replace('public' , 'storage' , $save_file);
            }
        }

        $product -> save();

        return redirect() -> route('digitalproducts.index');
    }   


    public function show($id){
        
    }

    public function edit($id){
        
        $product = DigitalContent::find($id);
        $productType = DigitalContentType::where("id" , '=' , $product->digital_content_type_id)->get();
        $types = DigitalContentType::all();
        $cats = $product -> category -> pluck('id') -> toarray();
        $cats = implode(',' , $cats);
        $categories = Category::all();
        $user = Auth::user();
        $roles = $user->getRoleNames();

        return view('dashboard.editProduct' , compact(['product' , 'types' , 'cats' , 'categories' , 'user' , 'roles' , 'productType']));

    }

    public function update(ProductRequest $request,DigitalContent $digitalproduct){
        
        $digitalproduct->update($request->safe()->all());
        $digitalproduct->digital_content_type()->associate($request->safe()['type']);
        if ($digitalproduct->category == null){
            $digitalproduct->category()->sync(explode(',', $request->category));
        }
        else{
            $digitalproduct->category()->detach();
        }
        
        if ($request->hasFile('image')){
            File::delete(File::glob(storage_path('app/public/contents/'.'cover'.$digitalproduct->id.'*')));
            $extention = $request->file('image')->extension(); 
            $save_file = $request->file('image')->storePubliclyAs('public/contents', 'cover'.$digitalproduct->id.'.'.$extention);
            if ($save_file){
                $digitalproduct->image_url = str_replace('public', 'storage',  $save_file);

            }
        }

        $digitalproduct->save();
        return redirect()->route('digitalproducts.index');
    }

    public function destroy($id){
        $product=DigitalContent::where('id','=',$id);
        $product->delete();
        return redirect()->back();
    }
}
