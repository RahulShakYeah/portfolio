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
            "status" => "required|in:active,inactive"
        ]);
        $category = new Category();
        $category->name = $request->get('name');
        $category->summary = $request->get('summary');
        $category->status = $request->get('status');
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

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('blogger.category.edit')->with('category',$category);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            "name"=>"required|min:3",
            "status" => "required|in:active,inactive"
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->summary = $request->get('summary');
        $category->status = $request->get('status');
        $status = $category->save();
        if($status == true) {
            return redirect()->route('blogger.list')->with('success','Category updated successfully');
        }else{
            return redirect()->route('blogger.edit')->with('error','Error occured');
        }
    }
}
