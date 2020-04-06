@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title" >Create Portfolio</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('portfolio.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="proj_name" class="col-3">Project Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="proj_name" name="proj_name" placeholder="Enter project name">
                                        @error('proj_name')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="git_url" class="col-3">GIT URL</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="git_url" name="git_url" placeholder="Enter git url">
                                        @error('git_url')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="site_url" class="col-3">SITE URL</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="site_url" name="site_url" placeholder="Enter site url">
                                        @error('site_url')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="summary" class="col-3">Project Summary</label>
                                    <div class="col-sm-9">
                                        <textarea name="summary" id="summary" cols="90" rows="6" class="form-control" style="resize: none"></textarea>
                                        @error('summary')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="summernote" class="col-3">Project Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="summernote" cols="90" rows="90"></textarea>
                                        @error('description')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-3">Project Cover Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="image" name="image">
                                        @error('image')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-3">Project Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="active">Publish</option>
                                            <option value="inactive">Un-Publish</option>
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
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
