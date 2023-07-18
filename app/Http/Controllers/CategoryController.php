<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    //
    public function index(Request $request){
        $categories = DB::table('category')->get();
        return view('category.index', compact('categories'));
    } 

    public function addCategory(){
        
    }
}
