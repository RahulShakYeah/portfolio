<?php

namespace App\Http\Controllers;

use App\Mail\Notification;
use App\Video;
use Illuminate\Http\Request;
use App\Testimonial;
use App\About;
use App\Subscription;
use App\Link;
use App\Category;
use App\Blog;
use Mail;
use App\Portfolio;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function sendTestimonial()
    {
        $category = Category::where('status', 'active')->get();
        $link = Link::where('status', 'active')->get();
        $about = About::get();
        $portfolio = Portfolio::where('status','active')->orderBy('created_at','DESC')->limit(4)->get();
        $testimonial = Testimonial::orderBy('created_at', 'DESC')->where('status', 'active')->get();
        return view('frontend.index', compact('testimonial', 'about', 'link', 'category','portfolio'));
    }

    public function getAllBlog()
    {
        $category = Category::where('status', 'active')->get();
        $recent = Blog::where('status', 'active')->orderBy('created_at', 'DESC')->limit(4)->get();
        $link = Link::where('status', 'active')->get();
        $blog = Blog::where('status', 'active')->orderBy('created_at', 'DESC')->paginate(5);
        return view('frontend.blog', compact('link', 'blog', 'category', 'recent'));
    }

    public function getSpecificBlog($id,$slug)
    {
        $category = Category::where('status', 'active')->get();
        $recent = Blog::where('status', 'active')->orderBy('created_at', 'DESC')->limit(4)->get();
        $link = Link::where('status', 'active')->get();
        $blog = Blog::findOrFail($id);
        $blogKey = 'blog_'.$blog->id;
        if(!Session::has($blogKey)){
            $blog->increment('view_count');
            Session::put($blogKey,1);
        }
        $related = Blog::where('id', '!=', $id)
            ->where('status','active')
            ->where('cat_id', '=', $blog->cat_id)
            ->get();
        return view('frontend.singleblog', compact('blog', 'link', 'related','category','recent'));
    }

    public function search(Request $request)
    {
        $recent = Blog::where('status', 'active')->orderBy('created_at', 'DESC')->limit(4)->get();
        $category = Category::where('status', 'active')->get();
        $link = Link::where('status', 'active')->get();
        $data = $request->get('search');
        $search = Blog::with('category')->where('title', 'like', '%' . $data . '%')->orderBy('created_at', 'DESC')->paginate(5);
        return view('frontend.searchblog', compact('search', 'category', 'recent', 'link', 'data'));
    }

    public function contactView()
    {
        $link = Link::where('status', 'active')->get();
        return view('frontend.contact', compact('link'));
    }

    public function contactData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required'
        ]);

        $data = $request->all();
        Mail::to('rahulshakya123rs@gmail.com')->send(new Notification($data));
        return redirect()->route('contact.view')->with('success', 'Thank you ! ' . $data['name'] . ' for contacting me. Will get back to you as soon as possible');

    }

    public function video(){
        $link = Link::where('status', 'active')->get();
        $video = Video::where('status','active')->paginate(12);
        return view('frontend.video', compact('link','video'));
    }

    public function aboutme(){
        $link = Link::where('status', 'active')->get();
        $testimonial = Testimonial::orderBy('created_at', 'DESC')->where('status', 'active')->get();
        $about = About::get();
        return view('frontend.about',compact('link','testimonial','about'));
    }
}
