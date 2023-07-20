@extends('templates.layout')
@section('content')


    

        <form action="{{ route('route_category_edit',['id'=>$category->id]) }}"  method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Nhập category của sản phẩm">
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>






@endsection


