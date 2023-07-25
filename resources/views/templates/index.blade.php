<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ - Cửa hàng quần áo</title>
  <style>
    /* Reset some default styles */
    body,
    h1,
    h2,
    h3,
    p,
    ul,
    li {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    nav {
      background-color: #444;
      color: #fff;
      display: flex;
      justify-content: center;
      padding: 10px;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      padding: 10px 20px;
    }

    nav a:hover {
      background-color: #555;
    }

    section {
      padding: 20px;
    }

    .featured-products {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .product {
      border: 1px solid #ddd;
      padding: 10px;
      width: 200px;
      margin: 10px;
    }

    .product img {
      max-width: 100%;
      height: auto;
    }

    .product h3 {
      margin-top: 10px;
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>

<body>
  <header>
    <h1>Cửa hàng quần áo</h1>
  </header>
  <nav>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
  </nav>
  <section>
    <div class="content">
        @foreach($products as $p)
        <div class="card" style="width: 18rem;">
            <img src="{{ $p->image }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $p->name }}</h5>
              <h6>{{ $p->price }} đ</h6>
              <p class="card-text">{{ $p->desc }}</p>
              <button  class="btn btn-primary"><a href="#">Buy</a></button>
            </div>
          </div>
          @endforeach
        @yield('content')
    </div>
    
  </section>
  {{-- <footer>
    <p>Bản quyền © 2023 - Cửa hàng quần áo</p>
  </footer> --}}
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>

  <script src="{{ asset('libs/input-mask/jquery.inputmask.js') }}"></script>
  @yield('script')
</body>

</html>
