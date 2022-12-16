@extends('admin.layout.mastr')
@section('content')
<div class="container">

    @include('admin.inc.alerts.errors')
    @include('admin.inc.alerts.success')

<div class="clearfix">...</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Show Posts</h3>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Comments</th>
                    <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                     <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->author}}</td>
                        <td>{{$post->content}}</td>
                        <td><img class="img-thumbnail" src="{{asset($post->image)}}"></td>

                        <td>{{$post->created_at}}</td>
                        <td>
                            <a href="{{route('comments.show',$post->id)}}">
                              <span class="badge rounded-pill text-bg-info">{{count($post->comments)}}</span>
                            </a>
                        </td>
                        <td>
                            <div class="btn-group" role="group"
                                 aria-label="Basic example">
                                <a href="{{route('post.edit',$post -> id)}}"
                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>


                                <a href="{{route('post.delete',$post -> id)}}"
                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>

                                @if($post -> deleted_at)
                                <a href="{{route('post.restore',$post -> id)}}"
                                    class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">restore</a>


                                @else
                                    <a href="{{route('post.softdelete',$post -> id)}}"
                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">soft delete</a>
                                    @endif
                                </a>
                            </div>
                        </td>
                     <tr>
                  @endforeach
                 </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>
@endsection
