<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\About;
use App\Subscription;
class FrontEndController extends Controller
{
    public function sendTestimonial(){
        $about = About::get();
        $testimonial = Testimonial::orderBy('created_at','DESC')->where('status','active')->get();
        return view('frontend.index',compact('testimonial','about'));
    }


}
