@extends('layouts.app')

@section('content')
<div class="col-md-8 blog-main">
    <div class="blog-post">
        <h2 class="blog-post-title">
            {{ $post->title }}
            @can('update', $post)
                <a class="small" href="/admin/posts/{{ $post->slug }}/edit"><i class="far fa-edit"></i></a> 
            @endcan
        </h2>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
        <p>
            {{ $post->body }}
        </p>

        @forelse ($post->history as $item)
            <p>
                User {{ $item->email }} updated post {{ $item->pivot->created_at->diffForHumans() }}: <br/>
                Before: {{ $item->pivot->before }} <br/>
                After: {{ $item->pivot->after }} <br/>
            </p>
        @empty
            <p>No history</p>
        @endforelse

    </div>
    <nav class="blog-pagination">
        <a class="btn btn-outline-secondary" href="/posts" tabindex="-1" aria-disabled="true">Назад</a>
    </nav>
</div>
@endsection
