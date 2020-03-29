@extends('layouts.blogger')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title" >Create Album</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('album.store')}}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="alb_name" class="col-3">Album Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alb_name" name="name" placeholder="Enter Album name">
                                        @error('name')
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
                    <small><em>Any Album added will be reviewed and published by the admin</em></small>
                </div>
            </div>
        </div>
    </div>
@endsection
