@extends('templates.layout')
@section('content')


    

        <form action="{{ route('route_product_add') }}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên của sản phẩm">
            </div>

            <div class="mb-3">
                {{-- <label class="form-label">Category_ID</label>
                <input type="number" class="form-control" name="category_id"> --}}
                <label class="form-label">Category_ID</label>
                <select class="form-select" name="category_id" id="category" aria-label="Default select example">
                    {{-- <option selected>Open this select menu</option> --}}
                    @foreach($categories as $ca)
                    <option value="{{ $ca->id }}" name="category_id">{{ $ca->name }}</option>
                    {{-- <option value="2">Two</option>
                    <option value="3">Three</option> --}}
                    @endforeach
                  </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="desc" placeholder="Nhập mô tả của sản phẩm">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Nhập giá của sản phẩm">
            </div>
            <div class="mb-3">
                <label class="form-label">Size</label>
                <input type="text" class="form-control" name="size" placeholder="Nhập giá của sản phẩm">
            </div>
            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="text" class="form-control" name="color" placeholder="Nhập màu sắc của sản phẩm">
                
            </div>
            <div class="mb-3">
                <label for="date_add" class="form-label">Date_add</label>
                <input type="date" name="date_add">
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-4 control-label">Ảnh CMND/CCCD</label>
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        <div class="col-xs-6">
                            <img id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                 style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                            <input type="file" name="image" accept="image/*"
                                   class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                            <label for="cmt_truoc">Mặt trước</label><br/>
                        </div>
                    </div>
                </div>
    </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>






@endsection
@section('script')

<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_truoc").change(function () { //#cmt_truoc la id cua input
            readURL(this, '#mat_truoc_preview'); //#mat_truoc_preview la id cua anh de file
        });

    });
</script>
@endsection