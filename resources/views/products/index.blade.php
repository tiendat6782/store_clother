@extends('templates.layout')
@section('content')



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
            <th>Status</th>
            <th></th>
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
                <td>{{ $pr->status }}</td>
                
            </tr>
            @endforeach
        </tbody>
</table>
@endsection