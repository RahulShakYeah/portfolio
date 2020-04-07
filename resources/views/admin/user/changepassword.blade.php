@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title">Change user password</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form action="{{route('update.password')}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="cpassword" class="col-3">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="password" class="form-control" id="cpassword" name="cpassword" value="{{$user->password}}">
                                        @error('cpassword')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="npassword" class="col-3">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="npassword" name="npassword" placeholder="Enter new password">
                                        @error('npassword')
                                        <p class="alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <div class="col-9 offset-3">
                                    <button type="submit" class="btn btn-success">Change</button>
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
