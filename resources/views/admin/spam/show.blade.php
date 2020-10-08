@extends('admin.layouts.app')

@section('content')

    <div class="col-md-8">
        <h2>
            <a href="/admin/email-spam">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
            About "{{ $spam->title }}"
        </h2>
        <div class="form-group">
            <label for="title">Email title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $spam->title }}" disabled>
        </div>
        <div class="form-group">
            <label for="body">Text Body</label>
            <textarea  class="form-control" name="body" id="body" cols="30" rows="10" disabled>{{ $spam->body }}</textarea>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Recepients</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="recepients">
                    <option value="all" selected>All</option>
                    <option value="subscribers">Mail subscribers</option>
                    <option value="users">Users</option>
                    <option value="custom">Custom recepients</option>
                </select>
            </div>
            <div class="form-group" id="recepients_custom" style="display:none;">
                <label for="body">Custom recepients (seperate with coma)</label>
                <textarea  class="form-control" name="recepients_custom" id="body" cols="10" rows="2" placeholder="john@mail.com, doe@mail.com, ...">{{ $spam->recepients_custom }}</textarea>
            </div>
        </div>
    </div>
@endsection
