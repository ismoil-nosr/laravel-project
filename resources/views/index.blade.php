@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
        Список постов
        </h3>
        @foreach ($posts as $post)        
            <div class="blog-post">
                <h2 class="blog-post-title"> 
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a> 
                </h2>
                <p class="blog-post-meta"> {{$post->created_at->toFormattedDateString()}} </p>

                <p> {{$post->short_body}} </p>
            </div><!-- /.blog-post -->
        @endforeach    
    </div><!-- /.blog-main -->
@endsection
