@extends('layouts.blogger')
@section('videostatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title" >Edit Video Details(Youtube Only)</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('update.video')}}">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Name</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="hidden" name="id" value="{{$video->id}}">
                                    <input value="{{$video->title}}" type="text" class="form-control form-control-sm form-control-dark" name="name" placeholder="Enter the video name....">
                                    @error('name')
                                    <span class="alert-danger col-12 col-md-9">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Video URL(Youtube Only)</label></div>
                                <div class="col-12 col-md-9">
                                    <input value="{{$video->video_link}}" type="url" class="form-control form-control-sm form-control-dark" name="videourl" placeholder="Enter the video url....">
                                    @error('videourl')
                                    <span class="alert-danger col-12 col-md-9">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Summary</label>
                                </div>
                                <div class="col-12 col-md-9"><textarea name="summary" id="textarea-input" rows="9"
                                                                       placeholder="Enter video summary..." class="form-control form-control-sm" style="resize: none">{{$video->summary}}</textarea>
                                    @error('summary')
                                    <span class="alert-danger col-12 col-md-9">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-3">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" class="form-control">
                                        <option value="active" {{$video->status == "active"?"selected":""}}>Publish</option>
                                        <option value="inactive" {{$video->status == "inactive"?"selected":""}}>Un-Publish</option>
                                    </select>
                                    @error('status')
                                    <p class="alert-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-9 offset-3">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <small><em>Rahul Shakya &copy; 2020</em></small>
                </div>
            </div>
        </div>
    </div>
@endsection
