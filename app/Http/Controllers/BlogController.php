<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderBy('created_at','DESC')->get();
        return view('blogger.blog.list')->with('blog',$blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogger.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "required|min:3",
            "summary" => "required",
            'metatitle' => "required",
            "description" => "required",
            "image" => "sometimes|image",
            "status" => "required|in:active,inactive",
            "is_featured" => "sometimes|in:1",
            "category" => "required|exists:categories,id"
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/uploads/blog';
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = 'Blog_' . time() . rand(0, 999) . $file->getClientOriginalName();
            $file->move($path, $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $blog = new Blog();
        $blog->title = $request->get('title');
        $blog->metatitle = $request->get('metatitle');
        $blog->summary = $request->get('summary');
        $blog->slug = \Str::slug($request->get('title'));
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
        return redirect()->route('blog.index')->with('success','Blog added successfully');
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
        $blog = Blog::findOrFail($id);
        return view('blogger.blog.edit')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "title" => "required|min:3",
            "metatitle" => "required",
            "summary" => "required",
            "description" => "required",
            "is_featured" => "sometimes|in:1",
            "status" => "required|in:active,inactive",
            "category" => "required|exists:categories,id"
        ]);
        $blog = Blog::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $old_path = public_path() . '/uploads/blog/' . $blog->image;

            if (\File::exists($old_path)) {
                \File::delete($old_path);
            }

            $path = public_path() . '/uploads/blog/';
            $filename = 'Blog_' . time() . rand(0, 999) . $file->getClientOriginalName();
            $file->move($path, $filename);

        }else{
            $filename = $blog->image;
        }
        $blog->title = $request->get('title');
        $blog->summary = $request->get('summary');
        $blog->metatitle = $request->get('metatitle');
        $body = htmlentities($request->get('description'));
        $blog->description = $body;
        if(request()->get('is_featured') == null){
            $data = 0;
        }else{
            $data = 1;
        }
        $blog->is_featured = $data;
        $blog->cat_id = $request->get('category');
        $blog->status = $request->get('status');
        $blog->image = $filename;
        $blog->save();
        return redirect()->route('blog.index')->with('success','Blog data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if(auth()->user()->id == $blog->added_by) {
            $path = "uploads/blog/" . $blog->image;
            if (\File::exists($path)) {
                \File::delete($path);
            }
            $status = $blog->delete();
            if ($status == true) {
                return redirect()->route('blog.index')->with('success', 'Blog data delete successfully');
            } else {
                return redirect()->route('blog.index')->with('error', 'Error occured while deleting the blog.');
            }
        }else{
            return redirect()->route('blog.index')->with('error','Unauthorized user');
        }
    }
}
