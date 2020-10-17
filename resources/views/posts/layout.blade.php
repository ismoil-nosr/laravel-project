<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
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
</div>