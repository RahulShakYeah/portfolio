@extends('layouts.blogger')
@section('videostatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Video List
                <a href="{{route('video.create')}}" class="btn btn-success btn-sm float-right"><i
                        class="fa fa-plus"></i> Upload Video</a>
            </h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead>
                <th>S.N</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Added by</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($video) > 0)
                    @foreach($video as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->title}}</td>
                            <td>
                                <iframe src="https://www.youtube.com/embed/<?php echo $value->video_id?>"
                                        frameborder="0" allow="accelerometer" width="200px" height="100px"
                                        allowfullscreen></iframe>
                            </td>
                            <td>{{$value->user->name}}</td>
                            <td><span class="badge badge-{{$value->status == "active"?"success":"danger"}}">{{$value->status == "active"?"Publish":"Un-Publish"}}</span></td>
                            @if(auth()->user()->id == $value->added_by)
                                <td>
                                    <a href="{{route('edit.video',$value->id)}}" class="btn btn-primary btn-sm ml-1 mt-2" style="border-radius: 50px"><i class="fa fa-edit"></i></a>
                                    <form class="float-left" action="{{route('video.destroy',$value->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm mt-2" style="border-radius: 50px"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <span class="badge badge-warning">Only the author can delete the video</span>
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
