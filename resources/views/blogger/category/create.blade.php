@extends('layouts.blogger')
@section('catstatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title" >Create Category</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('blogger.store')}}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="cat_name" class="col-3">Category Name</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cat_name" name="name" placeholder="Enter category name">
                                        @error('name')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cat_summary" class="col-3">Category Summary</label>
                                    <div class="col-sm-9">
                                        <textarea name="summary" id="cat_summary" cols="90" rows="6" class="form-control" style="resize: none"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-3">Status</label>
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
                    <small><em>Rahul Shakya &copy; 2020</em></small>
                </div>
            </div>
        </div>
    </div>
@endsection
