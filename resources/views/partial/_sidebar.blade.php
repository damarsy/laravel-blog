<div class="col-md-4">
  <div class="row">
  	<div class="col-md-12">
		<h3 class="text-center">Categories</h3><br>
	  	@foreach($categories as $category)
	  	<a href="{{route('blog.category', $category->slug)}}" class="btn btn-primary btn-block">{{$category->name}}</a>
	  	@endforeach
  	</div>
  </div>
  <br><br><br>
  <div class="row">
  	<div class="col-md-12">
  		<h3 class="text-center">Tags</h3>
  		@foreach($tags as $tag)
	  	<a href="{{route('blog.tag', $tag->slug)}}" class="btn btn-primary" style="margin-top:5px">{{$tag->name}}</a>
	  	@endforeach
  	</div>
  </div>
</div>