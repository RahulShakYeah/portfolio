@extends('layouts.admin')
@section('sociallinkstatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title" >Edit Social Links</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('link.update',$link->id)}}">
                            @csrf
                            @method('patch')
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="name" class="col-3">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$link->name}}">
                                        @error('name')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="class" class="col-3">Class</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="class" name="class" value="{{$link->class}}">
                                        @error('class')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="links" class="col-3">Links</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="links" name="links" value="{{$link->link}}">
                                        @error('links')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-3">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="active" {{$link->status == "active"?"selected":""}}>Publish</option>
                                            <option value="inactive" {{$link->status == "inactive"?"selected":""}}>Un-Publish</option>
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
