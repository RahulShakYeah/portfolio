<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = Link::orderBy('created_at','DESC')->get();
        return view('admin.link.list')->with('link',$link);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
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
            'name' => 'required',
            'class' => 'required',
            'links' => 'required',
            'status' => 'required|in:active,inactive'
        ]);
        $link = new Link();
        $link->name = strtolower($request->get('name'));
        $link->class = strtolower($request->get('class'));
        $link->link = $request->get('links');
        $link->status = $request->get('status');
        $status = $link->save();
        if($status == true) {
            return redirect()->route('link.index')->with('success','Social Link added successfully');
        }else{
            return redirect()->route('link.index')->with('error','Error occured while adding the social link');
        }
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
        $link = Link::findOrFail($id);
        return view('admin.link.edit')->with('link',$link);
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
            'name' => 'required',
            'class' => 'required',
            'links' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $link = Link::findOrFail($id);
        $link->name = strtolower($request->get('name'));
        $link->class = strtolower($request->get('class'));
        $link->link = $request->get('links');
        $link->status = $request->get('status');
        $status = $link->save();
        if($status == true) {
            return redirect()->route('link.index')->with('success','Social Link updated successfully');
        }else{
            return redirect()->route('link.index')->with('error','Error occured while updating the social link');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::findOrFail($id);
        $status = $link->delete();
        if($status == true) {
            return redirect()->route('link.index')->with('success','Successfully deleted the social link');
        }else{
            return redirect()->route('link.index')->with('error','Error occured while deleting the social link');
        }
    }
}
