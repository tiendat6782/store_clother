@extends('templates.layout')
@section('content')


    

        <form action="{{ route('route_product_add') }}"  method="POST" >
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên của sản phẩm">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category_ID</label>
                <input type="number" class="form-control" id="category_id">
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <input type="text" class="form-control" id="desc" placeholder="Nhập mô tả của sản phẩm">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" placeholder="Nhập giá của sản phẩm">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" placeholder="Nhập giá của sản phẩm">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" class="form-control" id="color" placeholder="Nhập màu sắc của sản phẩm">
                
            </div>
            <div class="mb-3">
                <label for="date_add" class="form-label">Date_add</label>
                <input type="text" name="date" id="datepicker">
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
    // Sử dụng thư viện JavaScript để tạo datepicker tại id "datepicker"
    // Ví dụ: jQuery UI datepicker
    $(function() {
        $("#datepicker").datepicker();
    });
</script>
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