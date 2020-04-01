<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\About;
use App\Subscription;
use App\Link;
class FrontEndController extends Controller
{
    public function sendTestimonial(){
        $link = Link::where('status','active')->get();
        $about = About::get();
        $testimonial = Testimonial::orderBy('created_at','DESC')->where('status','active')->get();
        return view('frontend.index',compact('testimonial','about','link'));
    }


}
