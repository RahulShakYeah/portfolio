@extends('layouts.blogger')
@section('catstatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Category List
                <a href="{{route('category.creation')}}" class="btn btn-success btn-sm float-right"><i
                        class="fa fa-plus"></i> Create Category</a>
            </h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead>
                <th>S.N</th>
                <th>Name</th>
                <th>Summary</th>
                <th>Added By</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($cat) > 0)
                    @foreach($cat as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->summary}}</td>
                            <td>{{$value->user->name}}</td>
                            <td><span class="badge badge-{{$value->status == "active"?"success":"danger"}}">{{$value->status == "active"?"Publish":"Un-publish"}}</span></td>
                            @if(auth()->user()->id == $value->added_by)
                                <td>
                                    <a href="{{route('cat.edit',$value->id)}}" class="btn btn-primary btn-sm mt-2" style="border-radius: 50px;"><i class="fa fa-edit"></i></a>
                                    <form class="float-left mr-1" method="DELETE" action="{{route('blogger.destroy',$value->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2"
                                                style="border-radius: 50px"><i class="fa fa-trash"></i></button>
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
