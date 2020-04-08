<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = Album::orderBy('created_at','DESC')->get();
        return view('blogger.album.alist')->with('album',$album);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogger.album.create');
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
            'name' => 'required|min:3',
            'status' => 'required|in:active,inactive'
        ]);

        $album = new Album();
        $album->name = $request->get('name');
        $album->status = $request->get('status');
        $album->added_by = auth()->user()->id;
        $status = $album->save();
        if($status == true) {
            return redirect()->route('album.index')->with('success', 'Album added successfully');
        }else{
            return redirect()->route('album.create')->with('error', 'Error occured while creating the album');
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
        $album = Album::findOrFail($id);
        return view('blogger.Album.edit')->with('album',$album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'status' => 'required|in:active,inactive'
        ]);
        $id = $request->get('id');
        $album = Album::findOrFail($id);
        $album->name = $request->get('name');
        $album->status = $request->get('status');
        $album->added_by = auth()->user()->id;
        $status = $album->save();
        if($status == true) {
            return redirect()->route('album.index')->with('success', 'Album updated successfully');
        }else{
            return redirect()->route('album.create')->with('error', 'Error occured while updating the album');
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
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('album.index')->with('success','Album deleted successfully');
    }
}
