@extends('layouts.admin')
@section('testimonialstatus','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-3 mb-2">Testimonial List
                <a href="{{route('testimonial.create')}}" class="btn btn-success btn-sm float-right"><i
                        class="fa fa-plus"></i> Create Testimonial</a>
            </h2>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="usertable">
                <thead class="thead-dark">
                <th>S.N</th>
                <th>Name</th>
                <th>URL</th>
                <th>Position</th>
                <th>Image</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                    @if(count($testi) > 0)
                        @foreach($testi as $key=>$value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->url}}</td>
                                <td>{{$value->position}}</td>
                                <td><img src="{{asset('uploads/testimonial/'.$value->image)}}" style="max-width:100px;"></td>
                                <td>{{substr($value->description,0,50)}}</td>
                                <td><span class="badge badge-{{$value->status == "active"?"success":"danger"}}">{{$value->status == "active"?"Publish":"Un-Publish"}}</span></td>
                                <td>
                                    <a href="{{route('testimonial.edit',$value->id)}}" class="btn btn-success btn-sm ml-1" style="border-radius: 50px"><i class="fa fa-edit"></i></a>&nbsp;
                                    <form class="float-left" method="post" action="{{route('testimonial.destroy',$value->id)}}">
                                        @csrf
                                        @method('DELETE')
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
