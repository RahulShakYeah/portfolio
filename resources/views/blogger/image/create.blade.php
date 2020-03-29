@extends('layouts.blogger')
@section('content')
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #3c8dbc">
                    <h3 class="card-title" >Insert Image in {{$album->name}}</h3>
                </div>
                <div class="card-body">
                    <div class="box box-primary">
                        <form method="post" action="{{route('image.store')}}" enctype="multipart/form-data" onsubmit="beforeSubmit();">
                            @csrf
                            <div class="box-body">
                                <div class="form-group row">
                                    <input type="hidden" name="album_id" value="{{$album->id}}">
                                    <label for="image" class="col-3">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image[]" multiple id="image" class="form-control"
                                               accept="image/*">
                                        @error('image')
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
                    <small><em>Any Image added will be reviewed and published by the admin</em></small>
                </div>
            </div>
        </div>
    </div>
@endsection
