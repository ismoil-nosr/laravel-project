@extends('admin.layouts.app')

@section('content')

    <div class="col-md-8">
        <h2>
            <a href="/admin/tags">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
            Edit tag "{{ $tag->name }}"
        </h2>
        <form action="/admin/tags/{{ $tag->name }}" method="POST">
            @csrf
            @method('PATCH')

            @if ($errors->count())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="role">Tag name</label>
                <input type="text" class="form-control" id="tag" name="name" value="{{ old('tag', $tag->name) }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="submit" class="btn btn-danger"
                onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                Delete
            </button>
        </form>

        <form id="delete-form" action="/admin/tags/{{ $tag->name }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
