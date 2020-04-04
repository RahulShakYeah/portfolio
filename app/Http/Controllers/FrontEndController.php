<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\About;
use App\Subscription;
use App\Link;
use App\Category;
use App\Blog;
class FrontEndController extends Controller
{
    public function sendTestimonial(){
        $category = Category::where('status','active')->get();
        $link = Link::where('status','active')->get();
        $about = About::get();
        $testimonial = Testimonial::orderBy('created_at','DESC')->where('status','active')->get();
        return view('frontend.index',compact('testimonial','about','link','category'));
    }

    public function getAllBlog(){
        $category = Category::where('status','active')->get();
        $recent = Blog::where('status','active')->limit(4)->get();
        $link = Link::where('status','active')->get();
        $blog = Blog::where('status','active')->paginate(5);
        return view('frontend.blog',compact('link','blog','category','recent'));
    }

    public function getSpecificBlog($id){
        $link = Link::where('status','active')->get();
        $blog = Blog::findOrFail($id);
        $related = Blog::where('id','!=',$id)
                        ->where('cat_id','=',$blog->cat_id)
                        ->get();
        return view('frontend.singleblog',compact('blog','link','related'));
    }


}
