@extends('admin.layouts.app')

@section('content')

<div class="col-md-8">
    <h2>
        <a href="/admin/tags">
            <i class="small fas fa-arrow-circle-left text-primary"></i>
        </a>
        Spam anyone
    </h2>

    <form action="/admin/email-spam" method="POST">
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
            <label for="title">Email title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="body">Text Body</label>
            <textarea  class="form-control" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Recepients</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="recepients_type">
                  <option value="all" selected>All</option>
                  <option value="subscribers">Mail subscribers</option>
                  <option value="users">Users</option>
                  <option value="custom">Custom recepients</option>
                </select>
            </div>
            <div class="form-group" id="recepients_custom" style="display:none;">
                <label for="body">Custom recepients (seperate with coma)</label>
                <textarea  class="form-control" name="recepients_custom" id="body" cols="10" rows="2" placeholder="john@mail.com, doe@mail.com, ...">{{ old('recepients_custom', 'admin@example.org') }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Send!</button>
    </form>
</div>

<br>
<br>

@endsection