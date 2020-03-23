@extends('layouts.blogger')
@section('blogstatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Blog List
                <a href="{{route('blog.create')}}" class="btn btn-success btn-sm float-right"><i
                        class="fa fa-plus"></i> Create Blog</a>
            </h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead>
                <th>S.N</th>
                <th>Title</th>
                <th>Body</th>
                <th>Image</th>
                <th>Status</th>
                <th>Added by</th>
                <th>Category</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($blog) > 0)
                    @foreach($blog as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{substr($value->description,0,50)}}</td>
                            <td>{{$value->image}}</td>

                            @if($value->status == "inactive")
                                <td>
                                    <span class="badge badge-danger">Under-review</span>
                                </td>
                            @else
                                <td>
                                    <span class="badge badge-success">{{$value->status}}</span>
                                </td>
                            @endif
                            <td>{{$value->added_by}}</td>
                            <td>{{$value->cat_id}}</td>
                            @if(auth()->user()->id == $value->added_by)
                                <td><button class="btn btn-danger btn-sm" style="border-radius: 50px" type="submit"><i class="fa fa-trash"></i></button></td>
                                @else
                                <td><span class="badge badge-warning">Only the author can delete the blog</span></td>
                                @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection
