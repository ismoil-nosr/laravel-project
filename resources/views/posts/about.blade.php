@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
    <div class="blog-post">
      <h2 class="blog-post-title"> {{$post->title}} </h2>
      <p class="blog-post-meta"> {{$post->created_at->toFormattedDateString()}} </p>

      <p> {{$post->full_body}} </p>
    </div><!-- /.blog-post -->

    <nav class="blog-pagination">
      <a class="btn btn-outline-secondary" href="/" tabindex="-1" aria-disabled="true">Back</a>
    </nav>

  </div><!-- /.blog-main -->
@endsection