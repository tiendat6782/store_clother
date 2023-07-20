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
            <a class="nav-link" href="{{ route('route_product_add') }}">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/product') }}">List</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  
  <form action="{{ url('/product') }}" method="post">
    @csrf
    <label for="search">Name
    <input type="text" name="search">
</label>
    <input type="submit" name="btnSearch" value="Tim kiem">
</form>

<table class="table table-danger table-inverse table-responsive" border="3">
    
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category_id</th>
            <th>Desc</th>
            <th>Price</th>
            <th>Size</th>
            <th>Color</th>
            <th>Date_add</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $pr)
            <tr>
                <td>{{ $pr->id }}</td>
                <td>{{ $pr->name }}</td>
                <td>{{ $pr->category_id }}</td>
                <td>{{ $pr->desc }}</td>
                <td>{{ $pr->price }}</td>
                <td>{{ $pr->size }}</td>
                <td>{{ $pr->color }}</td>
                <td>{{ $pr->date_add }}</td>
                <td><img src="{{ $pr->image?''.Storage::url($pr->image):''}}" style="width: 100px" /></td>
                <td>{{ $pr->status }}</td>
                <td><a href="{{ route('route_product_delete',['id'=>$pr->id]) }}">delete</a></td>
                <td><a href="{{ route('route_product_edit',['id'=>$pr->id]) }}">edit</a></td>
                
            </tr>
            @endforeach
        </tbody>
</table>
@endsection