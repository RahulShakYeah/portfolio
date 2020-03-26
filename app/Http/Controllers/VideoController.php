<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::orderBy('created_at','DESC')->with('user')->get();
        return view('blogger.video.list')->with('video',$video);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogger.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video();
        $video->title = $request->get('name');
        $video->summary = $request->get('summary');
        $video->video_link = $request->get('videourl');
        $video_id = $video->getYoutubeVideoId($request->get('videourl'));
        $video->added_by = auth()->user()->id;
        $video->video_id = $video_id;
        $status = $video->save();
        if($status == true) {
            return redirect()->route('video.index')->with('success', 'Video added successfully');
        }else{
            return redirect()->route('video.create')->with('error', 'Error occured while adding the video');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        if(auth()->user()->id == $video->added_by) {
            $status = $video->delete();
            if($status == true) {
                return redirect()->route('video.index')->with('success', 'Video Details Deleted Successfully');
            }else{
                return redirect()->route('video.index')->with('error', 'Error occured while deleting the video');
            }
        }else{
            return redirect()->route('video.index')->with('error', 'Unauthorized user');
        }
    }
}
