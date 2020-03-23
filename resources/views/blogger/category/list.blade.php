@extends('layouts.blogger')
@section('catstatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Category List
                <a href="{{route('blogger.create')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Insert Category</a>
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
                            @if($value->status == "inactive")
                                <td><span class="badge badge-danger">Under-review</span></td>
                                @else
                                <td><span class="badge badge-success">Publish</span></td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection
