@extends('layouts.app')

@section('content')
        <div class="col-md-8 blog-main">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                Our blog's posts
                @can('create', App\Post::class)
                    <a href="/admin/posts/create">
                        <i class="small fas fa-plus-circle text-primary"></i>
                    </a> 
                @endcan 
            </h3>

            @foreach ($posts as $post)
                @include('posts.layout')
            @endforeach
            
            {{ $posts->links() }}
        </div>
@endsection