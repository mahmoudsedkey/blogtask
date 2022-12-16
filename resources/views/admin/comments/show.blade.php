@extends('admin.layout.mastr')
@section('content')
<div class="clearfix">...</div>

<div class="container clearfix">
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Show Comments</h3>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                <th>ID</th>
                <th>content</th>
                <th>User</th>
                <th>Operation</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($comments as $comment)
                 <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->user->username}}</td>
                    <td>
                        <div class="btn-group" role="group"
                             aria-label="Basic example">
                            <a href="{{route('comment.delete',$comment -> id)}}"
                               class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
                        </div>
                    </td>

                </tr>
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
@endsection
