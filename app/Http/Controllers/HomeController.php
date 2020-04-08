<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route(auth()->user()->role);
    }

    public function admin(){
        return view('admin.index');
    }

    public function blogger(){
        $blog = Blog::orderBy('created_at','DESC')->get();
        return view('blogger.index')->with('blog',$blog);
    }
}
