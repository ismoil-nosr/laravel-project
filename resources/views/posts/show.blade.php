@extends('layouts.app')

@section('content')
<div class="col-md-8 blog-main">
    <div class="blog-post">
        <h2 class="blog-post-title">
            {{ $post->title }}
            @can('update', $post)
                <a class="small" href="/posts/{{ $post->slug }}/edit"><i class="far fa-edit"></i></a> 
            @endcan
        </h2>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
        <p>
            {{ $post->body }}
        </p>
    </div>
    <nav class="blog-pagination">
        <a class="btn btn-outline-secondary" href="/posts" tabindex="-1" aria-disabled="true">Назад</a>
    </nav>
</div>
@endsection
