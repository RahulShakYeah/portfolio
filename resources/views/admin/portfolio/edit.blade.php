@extends('layouts.admin')
@section('portfoliostatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title">Edit Portfolio</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('portfolio.update',$portfolio->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="proj_name" class="col-3">Project Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="proj_name" name="proj_name"
                                               value="{{$portfolio->title}}">
                                        @error('proj_name')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="site_url" class="col-3">SITE URL</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="site_url" name="site_url"
                                               value="{{$portfolio->siteurl}}">
                                        @error('site_url')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="git_url" class="col-3">GIT URL</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="git_url" name="git_url"
                                               value="{{$portfolio->giturl}}">
                                        @error('git_url')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="summary" class="col-3">Summary</label>
                                    <div class="col-sm-9">
                                        <textarea name="summary" id="summary" cols="90" rows="6" class="form-control"
                                                  style="resize: none">{{$portfolio->summary}}</textarea>
                                        @error('summary')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-3">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" id="description" class="summernote" cols="90"
                                                  rows="6" class="form-control"
                                                  style="resize: none">{{html_entity_decode($portfolio->description)}}</textarea>
                                        @error('description')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-3">Project Image</label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" id="image" name="image">
                                        @error('image')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{asset('uploads/portfolio/'.$portfolio->image)}}" alt="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-3">Project status</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="active" {{$portfolio->status == "active"?"selected":""}}>
                                                Publish
                                            </option>
                                            <option value="inactive" {{$portfolio->status == "inactive"?"selected":""}}>
                                                Un-Publish
                                            </option>
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
