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
        <div class="tag-list">
            @foreach ($post->tags->all() as $tag)
                <a href="/posts/tags/{{ $tag->name }}" class="badge badge-secondary">{{ $tag->name }}</a>
            @endforeach
        </div>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
        <p>
            {{ $post->body }}
        </p>
        @admin
            <hr>
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Post update history
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
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
                    </div>
                </div>
            </div>
        @endadmin
        <hr>
        <div class="post-comments">
            <h2>| Comments</h2>
            <div class="post-comment-form">
                <form action="/posts/{{ $post->slug }}/comment" method="post">
                    @csrf
                    <textarea name="body" class="comment-body-form" cols="30" rows="10"></textarea>
                    <input type="submit" value="Comment">
                </form>
            </div>
            <ul>
                
                @forelse ($comments as $comment)
                    <li>
                        {{ $comment->author->name }} | {{ $comment->body }}
                    </li>
                @empty
                    <p>No comments yet...</p>
                @endforelse
            </ul>
        </div>
    </div>
    <nav class="blog-pagination">
        <a class="btn btn-outline-secondary" href="/posts" tabindex="-1" aria-disabled="true">Назад</a>
    </nav>
</div>
@endsection
