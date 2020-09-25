@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <form action="/posts" method="POST">
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
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="slug">Slug (optional)</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea  class="form-control" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}">
        </div>
        <div class="form-group form-check">
            <input type="hidden" class="form-check-input" id="published" name="published" value="0">
            <input type="checkbox" class="form-check-input" id="published" name="published" value="1" {{old('published') ? 'checked' : '' }}>
            <label class="form-check-label" for="published">Publish post</label>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection
