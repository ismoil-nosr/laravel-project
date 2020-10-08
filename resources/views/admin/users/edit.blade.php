@extends('admin.layouts.app')

@section('content')

    <div class="col-md-8">
        <h2>
            <a href="/admin/users">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
            Edit user "{{ $user->name }}"
        </h2>
        <form action="/admin/users/{{ $user->id }}" method="POST">
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
                <label for="role">Role name</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ old('role', $user->name) }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="submit" class="btn btn-danger"
                onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                Delete
            </button>
        </form>

        <form id="delete-form" action="/admin/users/{{ $user->id }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
