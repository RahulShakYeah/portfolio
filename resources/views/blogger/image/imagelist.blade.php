@extends('layouts.blogger')
@section('image','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Image List</h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead>
                <th>S.N</th>
                <th>Name</th>
                <th>Album Name</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($images) > 0)
                    @foreach($images as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset('storage/'.$value->image)}}" style="max-width: 100px"></td>
                            <td>{{$value->album->name}}</td>
                            <td>
                                <form class="float-left" action="{{route('image.destroy',$value->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-2"
                                            style="border-radius: 50px"><i class="fa fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection
