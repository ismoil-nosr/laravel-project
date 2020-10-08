@extends('admin.layouts.app')

@section('content')
    <h2> Roles 
        <a href="/admin/tags/create">
            <i class="small fas fa-plus-circle text-primary"></i>
        </a> 
    </h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href="tags/{{ $tag->name }}/edit" class="badge badge-secondary">Edit</a>
                            <a href=""
                               class="delete-item badge badge-danger" 
                               data-id="{{ $tag->name }}">
                               Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
