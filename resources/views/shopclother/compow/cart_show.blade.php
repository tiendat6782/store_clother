<form action="">
    <div class="cart" data-url="{{ route('deleteCart') }}">
    <h2>Giỏ hàng</h2>
    <table class="table table-inverse table-responsive update_cart_url" border="3" data-url="{{ route('updateCart') }}">
        <tr>
            <th>#</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            <th>Thao tác</th>
        </tr>
        @php
        $total = 0;
        @endphp
    
        @foreach($carts as $id => $item)
        @php
        $total += ($item['price'] * $item['quantity']);
        @endphp
        <tr>
            <td>{{ $id }}</td>
            <td>{{ $item['name'] }}</td>
            <td>
                <input type="number" class="quantity" value="{{ $item['quantity'] }}" min="1">
            </td>
            <td>{{ number_format($item['price']) }} VND</td>
            <td>{{ number_format($item['price'] * $item['quantity']) }} VND</td>
            <td>
                <button type="button" class="btn btn-danger"><a data-id="{{ $id }}" class="cart_delete" style="color: white;text-decoration: none" href="">Xóa</a></button>
                <button type="button" class="btn btn-warning"><a class="cart_update" data-id="{{ $id }}" style="color: black;text-decoration: none" href=""  >Cập nhật</a></button>
            </td>
        </tr>
        @endforeach
        
    </table>

    <h2 style="color: brown">Tổng thanh toán: <span style="color: black">{{ number_format($total) }} VND</span></h2>
</div>
</form>