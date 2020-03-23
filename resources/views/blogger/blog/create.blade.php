@extends('layouts.blogger')
@section('blogstatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title" >Create Blog</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('blogger.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="blog_title" class="col-3">Blog Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="blog_title" name="title" placeholder="Enter blog title">
                                        @error('title')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="summary" class="col-3">Summary</label>
                                    <div class="col-sm-9">
                                        <textarea name="summary" id="summary" cols="90" rows="6" class="form-control" style="resize: none"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desc" class="col-3">Blog Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" id="summernote" cols="100" rows="10" class="form-control" style="resize:none"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-3">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="is_featured" class="col-3">Is featured</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" name="is_featured" id="is_featured" value="1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="col-3">Category</label>
                                    <div class="col-sm-9">
                                        <select name="category" id="category" class="form-control">
                                            @php
                                                $cat = \App\Category::get();
                                            @endphp
                                            @foreach($cat as $key=>$value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                        </select>
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
                    <small><em>Any Blog added will be reviewed and published by the admin</em></small>
                </div>
            </div>
        </div>
    </div>
@endsection
