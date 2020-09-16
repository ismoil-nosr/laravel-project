@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Новый пост
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

      <form method="post" action="/posts">
        @csrf
        <div class="form-group">
          <label for="slug">Название поста для SEO (на латинице)</label>
          <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="form-group">
          <label for="title">Название поста</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Краткое описание поста</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="short_body" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Детальное описание поста</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="full_body" rows="3"></textarea>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="published" value="1">
          <label class="form-check-label" for="exampleCheck1" >Опубликовать</label>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
  </div><!-- /.blog-main -->
@endsection
