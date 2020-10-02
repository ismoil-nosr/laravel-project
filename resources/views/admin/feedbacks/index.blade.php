@extends('admin.layouts.app')

@section('content')
    <h2>Feedbacks</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $feedback->name }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->message }}</td>
                        <td>{{ $feedback->created_at }}</td>
                        <td>
                            <a href="feedbacks/{{ $feedback->id }}" class="badge badge-danger"
                                onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                Delete
                            </a>

                            <form id="delete-form" action="/admin/feedbacks/{{ $feedback->id }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
