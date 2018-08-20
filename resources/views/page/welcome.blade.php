@extends('main')
@section('title', 'Home')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1 class="display-4">Welcome to Adam's Blog !</h1>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore aperiam dicta nam suscipit vero ipsa incidunt beatae, similique, repellat consequatur ab eum est aut sed, commodi maiores repellendus illo quis.</p>
        @if(Auth::check())
        <a href="{{route('post.create')}}" class="btn btn-primary btn-lg">Create New Post</a>
        @endif
      </div>
    </div>
  </div>
  <div class="row"> <!-- beginning of posts -->
    <div class="col-md-8">
      @foreach($posts as $post)
        <div class="post">
          <h3>{{$post->title}}</h3>
          <p>{{substr($post->body, 0, 300)}}{{strlen($post->body)>300 ? '...':''}}</p>
          <a class="btn btn-primary" href="{{route('blog.show', $post->slug)}}" role="button">Read More</a>
        </div>
        <hr>
      @endforeach
    </div>
    @include('partial/_sidebar')
  </div> <!-- end of posts -->
  <div class="row justify-content-center">
    {{$posts->links()}}
  </div>
@endsection