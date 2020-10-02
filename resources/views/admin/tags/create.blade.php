@extends('admin.layouts.app')

@section('content')

<div class="col-md-8">
    <h2>
        <a href="/admin/tags">
            <i class="small fas fa-arrow-circle-left text-primary"></i>
        </a>
        Create tag
    </h2>

    <form action="/admin/tags" method="POST">
        @csrf

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
            <label for="title">Role name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection
