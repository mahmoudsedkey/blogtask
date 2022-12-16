@extends('admin.layout.mastr')

@section('content')

<div class="clearfix">...</div>

<div class="container">
 <div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$posts}}</h3>
        <p>Blog </p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
   </div>
 </div>
</div>
@endsection
