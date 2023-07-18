@extends('templates.layout')
@section('content')


    

        <form action="{{ route('route_category_add') }}"  method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập category của sản phẩm">
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>






@endsection


