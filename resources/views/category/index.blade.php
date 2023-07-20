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
            <a class="nav-link" href="{{ route('route_category_add') }}">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/category') }}">List</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

<table class="table table-danger table-inverse table-responsive" border="3">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                
                <td>{{ $c->status }}</td>
                <td><a href="{{ route('route_category_delete',['id'=>$c->id]) }}">delete</a></td>
                
            </tr>
            @endforeach
        </tbody>
</table>
@endsection