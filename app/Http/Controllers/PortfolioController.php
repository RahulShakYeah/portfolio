<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::orderBy('created_at','DESC')->get();
        return view('admin.portfolio.list')->with('portfolio',$portfolio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
            'proj_name' => 'required|string',
            'summary' => 'required',
            'site_url' => 'required|url',
            'git_url' => 'required|url',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required|in:active,inactive'
        ]);

        if($request->hasFile('image')){
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "Portfolio_".time().rand(0,999).$fileName.'.'.$extension;
            $path = $request->file('image')->storeAs('public/portfolio',$fileNameToStore);
        }else{
            $fileNameToStore = "noimage.jpg";
        }

        $portfolio = new Portfolio();
        $portfolio->title = $request->get('proj_name');
        $portfolio->summary = $request->get('summary');
        $portfolio->siteurl = $request->get('site_url');
        $portfolio->giturl = $request->get('git_url');
        $portfolio->description = htmlentities(request()->get('description'));
        $portfolio->status = $request->get('status');
        $portfolio->image = $fileNameToStore;
        $portfolio->save();
        return redirect()->route('portfolio.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
