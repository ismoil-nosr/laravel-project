@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Редактирование поста
      </h3>
           
      @if ($errors->count())
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $e)
            <li> {{$e}} </li>              
          @endforeach
          </ul>
        </div>
      @endif  

      <form method="post" action="/posts/{{$post->slug}}">
        @csrf
        @method('PATCH')
        
        <div class="form-group">
          <label for="slug">Название поста для SEO (на латинице)</label>
          <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
        </div>
        <div class="form-group">
          <label for="title">Название поста</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Краткое описание поста</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="short_body" rows="3">{{ old('short_body', $post->short_body) }}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Детальное описание поста</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="full_body" rows="3">{{ old('full_body', $post->full_body) }}</textarea>
        </div>
        <div class="form-group form-check">
          <input type="hidden" name="published" value="0">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="published" value="1" {{$post->published == 1 ? 'checked' : '' }}>
          <label class="form-check-label" for="exampleCheck1" >Опубликовать</label>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>

      <form action="/posts/{{$post->slug}}" method="post">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Удалить</button>
      </form>
  </div><!-- /.blog-main -->
@endsection
