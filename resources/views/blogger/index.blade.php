@extends('layouts.blogger')
@section('status','active')
@section('content')
    <div class="row">
        <div class="col-sm-12 mb-2 mt-2">
            <h1 class="text-dark">Dashboard</h1>
        </div><!-- /.col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\Category::where('status','active')->count()}}</h3>

                    <p>Total Category</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('blogger.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Blog::where('status','active')->count()}}</h3>

                    <p>Total Posts</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('blog.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{\App\Album::where('status','active')->count()}}</h3>

                    <p>Total Albums</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('album.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{\App\Video::where('status','active')->count()}}</h3>

                    <p>Total Videos(Youtube)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{route('video.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-sm-12">
            <canvas id="myChart"></canvas>
        </div>
        <div class="row mt-3">
            <h2>List of Blogs</h2>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="usertable">
                        <thead>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Summary</th>
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
                                    <td>{{substr($value->summary,0,50)}}</td>
                                    @if($value->image != "noimage.jpg")
                                        <td><img src="{{asset('storage/blog/'.$value->image)}}" style="max-width: 100px"
                                                 alt="{{$value->title}}"></td>
                                    @else
                                        <td><span class="badge badge-dark">No Image Uploaded</span></td>
                                    @endif
                                    <td><span class="badge badge-{{$value->status == "active"?"success":"danger"}}">{{$value->status == "active"?"Publish":"Un-Publish"}}</span></td>
                                    <td>{{$value->user->name}}</td>
                                    <td>{{$value->category->name}}</td>
                                    @if(auth()->user()->id == $value->added_by)
                                        <td>

                                            <a href="{{route('blog.edit',$value->id)}}" class="btn btn-success btn-sm ml-1 " style="border-radius: 60px;"><i class="fa fa-edit"></i></a>&nbsp;
                                            <form method="DELETE" action="{{route('blog.delete',$value->id)}}" method="post" class="float-left">
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" style="border-radius: 50px" type="submit">
                                                    <i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
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
        </div>
    </div>
@endsection
