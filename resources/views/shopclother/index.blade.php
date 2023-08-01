<!DOCTYPE html>
<html>
<head>
    <title>Shop</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <style>
        .hero {
	padding-bottom: 50px;
}

.hero.hero-normal {
	padding-bottom: 30px;
}

.hero.hero-normal .hero__categories {
	position: relative;
}

.hero.hero-normal .hero__categories ul {
	display: none;
	position: absolute;
	left: 0;
	top: 46px;
	width: 100%;
	z-index: 9;
	background: #ffffff;
}

.hero.hero-normal .hero__search {
	margin-bottom: 0;
}

.hero__categories__all {
	background: #7fad39;
	position: relative;
	padding: 10px 25px 10px 40px;
	cursor: pointer;
}

.hero__categories__all i {
	font-size: 16px;
	color: #ffffff;
	margin-right: 10px;
}

.hero__categories__all span {
	font-size: 18px;
	font-weight: 700;
	color: #ffffff;
}

.hero__categories__all:after {
	position: absolute;
	right: 18px;
	top: 9px;
	/* content: "3"; */
	font-family: "ElegantIcons";
	font-size: 18px;
	color: #ffffff;
}

.hero__categories ul {
	border: 1px solid #ebebeb;
	padding-left: 40px;
	padding-top: 10px;
	padding-bottom: 12px;
}

.hero__categories ul li {
	list-style: none;
}

.hero__categories ul li a {
	font-size: 16px;
	color: #1c1c1c;
	line-height: 39px;
	display: block;
}
a{
    text-decoration: none;
}
    </style>
</head>
<body>
  <header>
    <img src="https://intphcm.com/data/upload/banner-thoi-trang-nam.jpg" width="100%" height="300px" alt="">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
          {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> --}}
          <div style="margin-left: 350px" class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="{{ url('shop') }}">Home</a>
              <a class="nav-link" href="{{ route('showCart') }}">Show Cart</a>
              <a class="nav-link" href="#">Pricing</a>
              <a class="nav-link">Disabled</a>
            </div>
          </div>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
  </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Category</span>
                    </div>
                    <ul>
                      {{-- @foreach($categories as $ca)
                        <li><a href="#">{{ $ca->name }}</a></li>
                        @endforeach --}}
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="content">
                   
                    <!-- Nội dung -->
                    @yield('content')
                   
                </div>
    
            </div>
            
        </div>
        
        

        <div class="footer">
            {{-- <p>Bản quyền &copy; 2023 - Trang Web Đẹp</p> --}}
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
  
    <script src="{{ asset('libs/input-mask/jquery.inputmask.js') }}"></script>
    <script>
      function addToCart(event){
        event.preventDefault();
        
        let urlCart = $(this).data('url');
        $.ajax({
          type: "GET",
          url: urlCart,
          dataType: 'json',
          success: function (data) {
              // console.log(data);
              if(data.status === 200){
                alert("thêm sản phẩm vào giỏ hàng thành công");
              }
            },
            error: function () { 

             }
        });
      }
      
      $(function(){
        $('.add_to_cart').on('click', addToCart);
      });
    </script>
    @yield('script')
</body>
</html>
