@extends('templates.layout')
@section('content')


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('route_customer_add') }}">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/customer') }}">List</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $cus)
        <tr>
            <td>{{ $cus->id }}</td>
            <td>{{ $cus->name }}</td>
            <td>{{ $cus->email }}</td>
            <td>{{ $cus->date_of_birth }}</td>
            <td>{{ $cus->telephone }}</td>
            <td>
              <button type="button" class="btn btn-warning"><a style="color: black;text-decoration: none" href="{{ route('route_customer_edit',['id'=>$cus->id]) }}">edit</a></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection