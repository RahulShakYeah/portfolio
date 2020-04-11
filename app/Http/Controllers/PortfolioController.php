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
        $portfolio = Portfolio::orderBy('created_at', 'DESC')->get();
        return view('admin.portfolio.list')->with('portfolio', $portfolio);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'proj_name' => 'required|string',
            'summary' => 'required',
            'site_url' => 'required|url',
            'git_url' => 'required|url',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required|in:active,inactive'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/uploads/portfolio';
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = 'Portfolio_' . time() . rand(0, 999) . $file->getClientOriginalName();
            $file->move($path, $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

//        f($request->hasFile('image')){
//
//        $file = $request->file('image');
////
////        $old_path = public_path().'/uploads/'.$setting->company_logo;
////
////
////        if(File::exists($old_path)){
////            File::delete($old_path);
////        }
//
//        $path = public_path().'/uploads';
//
//        $filename = date('Ymdhis').'-'.$file->getClientOriginalName();
//
//        $file->move($path,$filename);
//
//        $setting->company_logo = $filename;

//    }


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
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit')->with('portfolio', $portfolio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'proj_name' => 'required|string',
            'summary' => 'required',
            'site_url' => 'required|url',
            'git_url' => 'required|url',
            'description' => 'required',
            'image' => 'image',
            'status' => 'required|in:active,inactive'
        ]);
        $portfolio = Portfolio::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $old_path = public_path() . '/uploads/portfolio/' . $portfolio->image;

            if (\File::exists($old_path)) {
                \File::delete($old_path);
            }

            $path = public_path() . '/uploads/portfolio/';
            $filename = 'Portfolio_' . time() . rand(0, 999) . $file->getClientOriginalName();
            $file->move($path, $filename);

        }


        $portfolio->title = $request->get('proj_name');
        $portfolio->summary = $request->get('summary');
        $portfolio->siteurl = $request->get('site_url');
        $portfolio->giturl = $request->get('git_url');
        $portfolio->description = htmlentities(request()->get('description'));
        $portfolio->status = $request->get('status');
        $portfolio->image = $filename;
        $status = $portfolio->save();
        if ($status == true) {
            return redirect()->route('portfolio.index')->with('success', 'Portfolio data successfully updated');
        } else {
            return redirect()->route('portfolio.index')->with('error', 'Error occurred while updating the portfolio data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $path = 'uploads/portfolio/' . $portfolio->image;
        if (\File::exists($path)) {
            \File::delete($path);
        }
        $status = $portfolio->delete();
        if ($status == true) {
            return redirect()->route('portfolio.index')->with('success', 'Portfolio data deleted successfully');
        } else {
            return redirect()->route('portfolio.index')->with('error', 'Error occured while deleting the portfolio data');
        }
    }

}
