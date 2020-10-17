@extends('admin.layouts.app')

@section('content')
    <h2>
        Spams
        <a href="/admin/email-spam/create">
            <i class="small fas fa-plus-circle text-primary"></i>
        </a>
    </h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Recepients type</th> {{-- subscribers/users/custom/all --}}
                    <th>Body</th> {{-- 120 strlimit --}}
                    <th>Date</th>  {{-- date sent --}}
                    <th>Manage</th>  {{-- show|delete --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($spams as $spam)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $spam->title }}</td>
                        <td>{{ $spam->recepients_type }}</td>
                        <td>{{ $spam->body }}</td>
                        <td>{{ $spam->created_at }}</td>
                        <td>
                            <a href="/admin/email-spam/{{ $spam->id }}" class="badge badge-primary"> 
                                Show 
                            </a>
                            <a href=""
                               class="delete-item badge badge-danger" 
                               data-id="{{ $spam->id }}">
                               Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
