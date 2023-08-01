@extends('shopclother.index')
@section('content')
<div class="row">
@foreach($products as $p)
<div class="col-lg-4">
<div class="card" style="width: 18rem;">
    <img src="{{ $p->image?''.Storage::url($p->image):''}}" class="card-img-top" alt="..." width="100px" height="300px">
    <div class="card-body">
      <h5 class="card-title">{{ $p->name }}</h5>
      <p class="card-text">{{ number_format($p->price) }} VND</p>
      <a href="#"
       data-url="{{ route('addToCart', ['id'=>$p->id]) }}" 
       class="btn btn-primary add_to_cart">Thêm vào giỏ hàng</a>
    </div>
  </div>
</div>
  @endforeach
</div>

@endsection