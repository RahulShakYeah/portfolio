@extends('layouts.admin')
@section('testimonialstatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title">Edit Testimonial</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('testimonial.update',$testimonial->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="name" class="col-3">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$testimonial->name}}">
                                        @error('name')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="url" class="col-3">Url</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="url" name="url" value="{{$testimonial->url}}">
                                        @error('url')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="position" class="col-3">Position</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="position" name="position" value="{{$testimonial->position}}">
                                        @error('position')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-3">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" id="description" cols="90" rows="6"
                                                  class="form-control" style="resize: none">{{$testimonial->description}}</textarea>
                                        @error('description')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-3">Reviewer Image</label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" id="image" name="image">
                                        @error('image')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{asset('uploads/testimonial/'.$testimonial->image)}}" style="max-width:200px" alt="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-3">status</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="active" {{$testimonial->status == "active"?"selected":""}}>Publish</option>
                                            <option value="inactive" {{$testimonial->status == "inactive"?"selected":""}}>Un-Publish</option>
                                        </select>
                                        @error('status')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <div class="col-9 offset-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <small>Rahul Shakya &copy; 2020</small>
                </div>
            </div>
        </div>
    </div>
@endsection
