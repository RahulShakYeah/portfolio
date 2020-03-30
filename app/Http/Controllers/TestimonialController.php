<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::orderBy('created_at','DESC')->get();
        return view('admin.testimonial.list')->with('testi',$testimonial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'position' => 'required|min:3',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required|in:active,inactive'
        ]);
        if($request->hasFile('image')){
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "Testimonial_".time().rand(0,999).$fileName.'.'.$extension;
            $path = $request->file('image')->storeAs('public/testimonial',$fileNameToStore);
        }else{
            $fileNameToStore = "noimage.jpg";
        }

        $testimonial = new Testimonial();
        $testimonial->name = $request->get('name');
        $testimonial->position = $request->get('position');
        $testimonial->description = $request->get('description');
        $testimonial->status = $request->get('status');
        $testimonial->image = $fileNameToStore;
        $status = $testimonial->save();
        if($status == true){
            return redirect()->route('testimonial.index')->with('success','Testimonial added successfully');
        }else{
            return redirect()->route('testimonial.create')->with('error','Error occured while adding the testimonial');
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
