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
        $category = new Category();
        $category->name = $request->get('name');
        $category->summary = $request->get('summary');
        $category->added_by = auth()->user()->id;
        $status = $category->save();
        if($status == true) {
            return redirect()->route('blogger.list')->with('success','Category added successfully');
        }else{
            return redirect()->route('blogger.create')->with('error','Error occured');
        }
    }

    public function destroy($id){
        $destroy = Category::findOrFail($id);
        $status = $destroy->delete();
        if($status == true){
            return redirect()->route('blogger.list')->with('success','Category deleted successfully');
        }else{
            return redirect()->route('blogger.create')->with('error','Error occured');
        }

    }
}
