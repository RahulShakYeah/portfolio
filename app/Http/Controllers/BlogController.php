<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class BlogController extends Controller
{
    public function index(){
        $blog = Blog::orderBy('created_at','DESC')->get();
        return view('blogger.blog.list')->with('blog',$blog);
    }

    public function create(){
        return view('blogger.blog.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            "title" => "required|min:3",
            "summary" => "required",
            "description" => "required",
            "image" => "sometimes|image",
            "is_featured" => "sometimes|in:1",
            "category" => "required|exists:categories,id"
        ]);

        if($request->hasFile('image')){
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "Blog_".time().rand(0,999).$fileName.'.'.$extension;
            $path = $request->file('image')->storeAs('public/blog',$fileNameToStore);
        }else{
            $fileNameToStore = "noimage.jpg";
        }

        $blog = new Blog();
        $blog->title = $request->get('title');
        $blog->summary = $request->get('summary');
        $body = htmlentities(request()->get('description'));
        $blog->description = $body;
        if(request()->get('is_featured') == null){
            $data = 0;
        }else{
            $data = 1;
        }
        $blog->is_featured = $data;
        $blog->cat_id = $request->get('category');
        $blog->added_by = auth()->user()->id;
        $blog->image = $fileNameToStore;
        $blog->save();
        return redirect()->route('blog.list')->with('success','Blog added successfully');

    }
}
