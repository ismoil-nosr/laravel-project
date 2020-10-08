@extends('admin.layouts.app')

@section('content')
    <h2> Posts 
        <a href="/admin/posts/create">
            <i class="small fas fa-plus-circle text-primary"></i>
        </a> 
    </h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Tags</th>
                    <th>Date</th>
                    <th>Published</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($post->body, 50, $end = '...') }}</td>
                        <td>{{ $post->tags->pluck('name')->implode(', ') }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->published ? 'yes' : 'no' }}</td>
                        <td>
                            <a href="posts/{{ $post->slug }}/edit" class="badge badge-secondary">Edit</a>
                            <a href=""
                               class="delete-item badge badge-danger" 
                               data-id="{{ $post->slug }}">
                               Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
