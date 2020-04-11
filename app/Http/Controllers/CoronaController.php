<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Link;
class CoronaController extends Controller
{
    public function index(){
        $link = Link::get();
        $response = Http::get('https://nepalcorona.info/api/v1/data/nepal');
        $responsew = Http::get('https://nepalcorona.info/api/v1/data/world');
        $responsen = Http::get('https://nepalcorona.info/api/v1/news');
        $world = json_decode($responsew,true);
        $news = json_decode($responsen,true);
        $data = json_decode($response,true);
        if(\Auth::check()) {
            return view('frontend.corona.coronaindex', compact('response', 'link', 'world', 'news'));
        }else{
            return redirect()->route('all')->with('error','Sorry you are not authorized to access the corona update page');
        }
    }
}
