@extends('admin.layout.mastr')
@section('title','Edit Post')
@section('content')
   <div class="clearfix">...</div>

    <div class="container">
        <div class="row">

            <h3 class="header">Edit Post</h3>
            <form class="row g-3" method="POST" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data" >
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}" id="exampleFormControlInput1" placeholder="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea2" class="form-label">Content</label>
                    <textarea class="form-control" id="exampleFormControlTextarea2"  name="content" rows="3">{{$post->content}}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Author Name</label>
                    <input type="text" class="form-control" name="author" id="exampleFormControlInput3" value="{{$post->author}}" placeholder="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="exampleFormControlInput4">
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
               </form>
            </div>
        </div>
@endsection
