@extends('layout.mastr')

@section('content')
<div class="clearfix"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-header">Our Blog</div>

                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header border-0 pb-0">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                          <!-- Avatar -->
                          <div class="avatar avatar-story me-2">
                            <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt=""> </a>
                          </div>
                          <!-- Info -->
                          <div>
                            <div class="nav nav-divider">
                              <h6 class="nav-item card-title mb-0"> <a href="#!"> {{$post->author}} </a></h6>
                              <span class="nav-item small"> 2hr</span>
                            </div>
                            <p class="mb-0 small">Web Developer at Webestica</p>
                          </div>
                        </div>
                        <!-- Card feed action dropdown START -->
                        <div class="dropdown">
                          <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                          </a>
                          <!-- Card feed action dropdown menu -->
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                       <!-- Card img -->
                       <img class="card-img" src="{{asset($post->image)}}" alt="Post">
                      <h3 class="header">{{$post->title}}</h3>
                       <p> {{$post->content}}</p>

                      <!-- Feed react START -->
                      <ul class="nav nav-stack py-3 small">

                        <li class="nav-item">
                          <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments ({{count($post->comments)}})</a>
                        </li>


                      </ul>
                      <!-- Feed react END -->

                      <!-- Add comment -->
                      <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                          <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt=""> </a>
                        </div>
                        <!-- Comment box  -->

                        <form class="w-100" method="post" action="{{route('user.comment')}}">
                          @csrf
                          <div class="form-group">
                          <input type="hidden" name="postId" value="{{$post->id}}">
                          <input type="text" data-autoresize="" class="form-control pe-4 bg-light"  placeholder="Your Name" name="username">

                          <div class="clearfix">...</div>
                          <textarea data-autoresize="" class="form-control pe-4 bg-light" name="content" rows="1" placeholder="Add a comment..."></textarea>
                        </div>
                        <div class="clearfix">...</div>
                          <button type="submit" class="form-control success">Comment</button>
                        </form>
                      </div>
                      <!-- Comment wrap START -->
                      <ul class="comment-wrap list-unstyled">
                        <!-- Comment item START -->
                        <li class="comment-item">
                          <div class="d-flex position-relative">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs">
                              <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
                            </div>
                            <div class="ms-2">

                              @foreach ($post->comments as $comment )


                              <!-- Comment by -->
                              <div class="bg-light rounded-start-top-0 p-3 rounded">
                                <div class="d-flex justify-content-between">
                                  <h6 class="mb-1"> <a href="#!"> {{$comment->user->username}} </a></h6>
                                  <small class="ms-2">5hr</small>
                                </div>
                                <p class="small mb-0">{{$comment->content}}</p>
                              </div>
                              <!-- Comment react -->
                              @endforeach
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="card-footer border-0 pt-0">
                      <!-- Load more comments -->

                    </div>
                    <!-- Card footer END -->
                  </div>


            </div>
        </div>
    </div>
</div>
@endsection

