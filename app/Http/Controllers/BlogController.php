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
}
