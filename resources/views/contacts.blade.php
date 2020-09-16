@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
        Контакты для связи
        </h3>
        <ul>
            <li>Email: info@email.com</li>
            <li>Tel: +123456789</li>
        </ul>
        
        <hr>

        @if (session()->has('success'))
        <div class="alert alert-success">
          <h1>Сообщение отправлено, спасибо!</h1>
        </div>
        @endif  
      
        @if ($errors->count())
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $e)
              <li> {{$e}} </li>              
            @endforeach
            </ul>
          </div>
        @endif  

        <form method="post" action="/contacts">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="message">Сообщение</label>
              <input type="text" class="form-control" id="message" name="message">
            </div>
    
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>

    </div><!-- /.blog-main -->
@endsection