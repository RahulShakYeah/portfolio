<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){
        $cat = Category::orderBy('created_at','DESC')->get();
        return view('blogger.category.list')->with('cat',$cat);
    }

    public function create(){
        return view('blogger.category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            "name"=>"required|min:3",
        ]);
    }
}
