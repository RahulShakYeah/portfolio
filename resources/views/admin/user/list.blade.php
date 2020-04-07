@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Users List
                <a href="{{route('user.create')}}" class="btn btn-success btn-sm float-right"><i
                        class="fa fa-plus"></i> Create Testimonial</a>
            </h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead class="thead-dark">
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($user) > 0)
                    @foreach($user as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td><span class="badge badge-{{$value->role == "admin"?"success":"danger"}}">{{$value->role}}</span></td>
                            <td><span class="badge badge-{{$value->status == "active"?"success":"danger"}}">{{$value->status}}</span></td>
                            <td>
                                <a href="{{route('user.edit',$value->id)}}" class="btn btn-success btn-sm" style="border-radius: 50px"><i class="fa fa-edit"></i></a>
                                <a href="{{route('open.form',$value->id)}}" class="btn btn-primary btn-sm" style="border-radius: 50px"><i class="fa fa-key"></i></a>
                                <form action="{{route('user.destroy',$value->id)}}" method="post" class="float-left">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm mr-1" style="border-radius: 50px"><i class="fa fa-trash"></i></button>
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
