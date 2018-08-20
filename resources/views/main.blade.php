<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    @yield('style')

    <title>Adam's Blog | @yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> <!-- beginning of navbar -->
      <a class="navbar-brand" href="/">Adam's Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {!!Request::is('/') ? 'active':''!!}">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {!!Request::is('contact') ? 'active':''!!}">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
          <li class="nav-item {!!Request::is('about') ? 'active':''!!}">
            <a class="nav-link" href="/about">About</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right">
          @if(Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hello {!!Auth::user()->name!!}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('post.index')}}">All Posts</a>
                <a class="dropdown-item" href="{{route('category.index')}}">All Categories</a>
                <a class="dropdown-item" href="{{route('tag.index')}}">All Tags</a>
                <div class="dropdown-divider"></div>
                {!!Form::open(['route' => 'logout'])!!}
                  {!!Form::submit('Logout', array('class' => 'dropdown-item'))!!}
                {!!Form::close()!!}
              </div>
            </li>
          @else
            <li class="nav-item {!!Request::is('login') ? 'active':''!!}">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
          @endif
        </ul>
      </div>
    </nav> <!-- end of navbar -->
    <br>
    <div class="container">
      @include('partial._message')
      @if(!Request::is('/'))
      <div class="row">
        <div class="col-md-12">
          <h1>@yield('title')</h1>
          <hr>
          <br>
        </div>
      </div>
      @endif
      @yield('content')
      <br>
      <hr>
      <p class="text-center">Copyright Adam Arsy Arbani - All Rights Reserved</p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    @yield('script');
  </body>
</html>