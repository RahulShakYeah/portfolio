@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Portfolio List
                <a href="{{route('portfolio.create')}}" class="btn btn-success btn-sm float-right"><i
                        class="fa fa-plus"></i> Create Portfolio</a>
            </h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead class="thead-dark">
                <th>S.N</th>
                <th>Title</th>
                <th>Summary</th>
                <th>Image</th>
                <th>GIT URL</th>
                <th>SITE URL</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($portfolio) > 0)
                    @foreach($portfolio as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{substr($value->summary,0,50)}}</td>
                            <td><img src="{{asset('uploads/portfolio/'.$value->image)}}" style="max-width: 100px" alt="{{$value->title}}"></td>
                            <td>{{$value->giturl}}</td>
                            <td>{{$value->siteurl}}</td>
                            <td><span class="badge badge-{{$value->status == "active"?"success":"danger"}}">{{$value->status == "active"?"Publish":"Un-Publish"}}</span></td>
                            <td>
                                <a href="{{route('portfolio.edit',$value->id)}}" class="btn btn-success btn-sm" style="border-radius: 50px;"><i class="fa fa-edit"></i></a>
                            <form action="{{route('portfolio.destroy',$value->id)}}" class="float-left mr-1" method="post">
                                @csrf
                                @method('delete')
                                    <button class="btn btn-danger btn-sm" style="border-radius: 50px"><i class="fa fa-trash"></i></button>
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
