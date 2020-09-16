@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
        Список обращений
        </h3>

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $f)        
                    <tr>
                        <th scope="row"> {{$f->id}} </th>
                        <td> {{$f->email}} </td>
                        <td> {{$f->message}} </td>
                        <td> {{$f->created_at}} </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>

    </div><!-- /.blog-main -->
@endsection