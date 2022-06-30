<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    
    public function index(){

        $Books = Book::all();

        return view('index' , compact('Books'));
    }

    public function readmore(Book $book){

        return view('read_more' , compact('book'));
    }
}
