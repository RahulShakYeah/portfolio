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
            "status" => "required|in:active,inactive",
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
        $blog->status = $request->get('status');
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

    public function indexPage(){
        $blog = Blog::orderBy('createad_at','DESC')->get();
        return view('blogger.index')->with('blog',$blog);
    }

    public function destroy($id){
        $blog = Blog::findOrFail($id);
        if(auth()->user()->id == $blog->added_by) {
            $path = "storage/blog/" . $blog->image;
            if (\File::exists($path)) {
                \File::delete($path);
            }
            $status = $blog->delete();
            if ($status == true) {
                return redirect()->route('blog.list')->with('success', 'Blog data delete successfully');
            } else {
                return redirect()->route('blog.list')->with('error', 'Error occured while deleting the blog.');
            }
        }else{
            return redirect()->route('blog.list')->with('error','Unauthorized user');
        }
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('blogger.blog.edit')->with('blog',$blog);
    }

    public function update(Request $request){
        $this->validate($request,[
            "title" => "required|min:3",
            "summary" => "required",
            "description" => "required",
            "is_featured" => "sometimes|in:1",
            "status" => "required|in:active,inactive",
            "category" => "required|exists:categories,id"
        ]);
        if($request->hasFile('image')){
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "Blog_".time().rand(0,999).$fileName.'.'.$extension;
            $path = $request->file('image')->storeAs('public/blog',$fileNameToStore);
        }else{
            $fileNameToStore=false;
        }
        $id = $request->get('id');
        $blog = Blog::findOrFail($id);
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
        if($fileNameToStore == false){
            $fileNameToStore = $blog->image;
        }elseif($fileNameToStore){
            $path = "storage/blog/".$blog->image;
            if(\File::exists($path)){
                \File::delete($path);
            }
        }
        $blog->status = $request->get('status');
        $blog->image = $fileNameToStore;
        $blog->save();

        return redirect()->route('blog.list')->with('success','Blog data updated successfully');

    }
}
