<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .nav-link:hover{
          color: red;
        }
    </style>
</head>
<body>
  
    <div class="container">
       

        <div class="content">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="#"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/product') }}"><h2>Product</h2></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/category') }}"><h2>Category</h2></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer') }}"><h2>Customer</h2></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><h4>Logout</h4></a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
            <!-- Nội dung -->
            @include('templates.errors')
            @yield('content')
           
        </div>

        <div class="footer">
            <p>Bản quyền &copy; 2023 - Trang Web Đẹp</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
  
    <script src="{{ asset('libs/input-mask/jquery.inputmask.js') }}"></script>
    @yield('script')
</body>
</html>
