@if ($tags->count())
    @foreach ($tags as $tag)
        <a href="/posts/tags/{{ $tag->getRouteKey() }}" class="badge badge-secondary">{{ $tag->name }}</a>
    @endforeach
@endif