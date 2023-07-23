@extends('templates.layout')
@section('content')

<form action="{{ route('route_customer_edit',['id'=>$customer->id]) }}"  method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" value="{{$customer->name}}" name="name" placeholder="Nhập tên của sản phẩm">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" value="{{$customer->email}}" name="email" placeholder="Nhập mô tả của sản phẩm">
    </div>
    
    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date_add</label>
        <input type="date" value="{{$customer->date_of_birth}}" name="date_of_birth">
        <div class="mb-3">
            <label class="form-label">Telephone</label>
            <input type="text" class="form-control" value="{{$customer->telephone}}" name="telephone" placeholder="Nhập mô tả của sản phẩm">
        </div>
    </div>
    

    <button type="submit" class="btn btn-primary">Update Customer</button>
</form>


@endsection