@extends('admin.layout.mastr')
@section('title','Create Post')
@section('content')

   <div class="clearfix">...</div>

    <div class="container">

        <div class="row">
            @include('admin.inc.alerts.success')
            @include('admin.inc.alerts.errors')
       </div>

        <div class="row">

        <h3 class="header">Create Post</h3>
        <form class="row g-3" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Author Name</label>
                <input type="text" class="form-control" name="author" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="exampleFormControlInput1">
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
           </form>
        </div>
    </div>
@endsection
