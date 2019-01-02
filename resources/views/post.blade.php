@extends('master')

@section('content')
<div class="well">
	<div class="blog-post">
		<h2 class="blog-post-title">{{$post['title']}}</h2>
		<p class="blog-post-meta">{{$post['created_at']}} by <a href="#">Mark</a></p>

		{!!$post['description']!!}
	</div><!-- /.blog-post -->
</div>
@endsection