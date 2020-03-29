@extends('layouts.blogger')
@section('image','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Album List
                <a href="{{route('album.create')}}" class="btn btn-success btn-sm float-right"><i
                        class="fa fa-plus"></i> Create Album</a>
            </h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead>
                <th>S.N</th>
                <th>Name</th>
                <th>Added By</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($album) > 0)
                    @foreach($album as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->user->name}}</td>
                            @if($value->status == "inactive")
                                <td><span class="badge badge-danger">Under-review</span></td>
                            @else
                                <td><span class="badge badge-success">Publish</span></td>
                            @endif
                            @if(auth()->user()->id == $value->added_by)
                                <td>
                                    <a href="{{route('image.add',$value->id)}}" class="btn btn-primary btn-sm ml-1 mt-2" style="border-radius: 50px"><i class="fa fa-images"></i></a>
                                    <a href="{{route('show.list',$value->id)}}" class="btn btn-success btn-sm mt-2" style="border-radius: 50px"><i class="fa fa-eye"></i></a>
                                    <form class="float-left" action="{{route('album.destroy',$value->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2" style="border-radius: 50px"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            @else
                                <td>
                                    <span class="badge badge-warning">Only the author can delete the category</span>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection
