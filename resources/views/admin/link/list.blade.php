@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Social Link List
                <a href="{{route('link.create')}}" class="btn btn-success btn-sm float-right"><i
                        class="fa fa-plus"></i> Create Social Link</a>
            </h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead class="thead-dark">
                <th>S.N</th>
                <th>Name</th>
                <th>Class</th>
                <th>Icon</th>
                <th>Link</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($link) > 0)
                    @foreach($link as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->class}}</td>
                            <td><i class="{{$value->class}}{{$value->name}}"></i></td>
                            <td>{{$value->link}}</td>
                            <td><span class="badge badge-{{$value->status == "active"?"success":"danger"}}">{{$value->status == "active"?"Publish":"Un-Publish"}}</span></td>
                            <td><a href="{{route('link.edit',$value->id)}}" class="btn btn-success btn-sm" style="border-radius: 50px"><i class="fa fa-edit"></i></a>
                                <form action="{{route('link.destroy',$value->id)}}" class="float-left" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm mr-1" style="border-radius: 50px"><i class="fa fa-trash"></i></button>
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
