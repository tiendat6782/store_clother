@extends('shopclother.index')
@section('content')
<div class="cart_wrapper">
    @include('shopclother.compow.cart_show');
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
    function cartUpdate(event){
        event.preventDefault();
        // alert('updateeeeee');
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).data('id');
        // alert(id);
        let quantity = $(this).parents('tr').find('input.quantity').val();
        // alert(quantity);
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {id: id, quantity: quantity},
            success: function(data){
                // console.log(data);
                if(data.status === 200){
                    $('.cart_wrapper').html(data.cart_show);
                    alert("cập nhật thành công giỏ hàng");
                }
            },
            error: function(){

            }
        });
    }
    function cartDelete(event){
        event.preventDefault();
        let urlDelete = $('.cart').data('url');
        let id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: urlDelete,
            data: {id: id},
            success: function(data){
                // console.log(data);
                if(data.status === 200){
                    $('.cart_wrapper').html(data.cart_show);
                    alert("xóa thành công sản phẩm");
                }
            },
            error: function(){

            }
        });
    }

    $(function(){
        $(document).on('click', '.cart_update', cartUpdate);
        $(document).on('click', '.cart_delete', cartDelete);

    });
</script>
@endsection