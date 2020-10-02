@extends('admin.layouts.app')

@section('content')
    <h2> Users 
        <a href="/admin/users/create">
            <i class="small fas fa-plus-circle text-primary"></i>
        </a> 
    </h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Email verified</th>
                    <th>Registered At</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="users/{{ $user->id }}/edit" class="badge badge-secondary">Edit</a>
                            <a href="" class="badge badge-danger"
                                onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                Delete
                            </a>

                            <form id="delete-form" action="/admin/users/{{ $user->id }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
