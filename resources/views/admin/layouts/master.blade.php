<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecommerce
  </title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('../plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('../dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light">Ecommerce</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('dashboard#page')}}" class="nav-link">
              <i class="fas fa-user-circle"></i>
              <p>
               My Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('list#page')}}" class="nav-link">
              <i class="fas fa-list"></i>
              <p>
                Admin List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('ava#page')}}" class="nav-link">
              <i class="fas fa-pizza-slice ms-5"></i>
              <p>
              Availability
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('blog#category')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                BLog Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('blog#post')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                BLog Post
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('blog#topic')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                BLog Topic
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{route('blog#tagpost')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                BLog Tagpost
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('brand#page')}}" class="nav-link">
              <i class="fas fa-pizza-slice ms-5"></i>
              <p>
              Brand
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{route('category#page')}}" class="nav-link">
              <i class="fas fa-pizza-slice ms-5"></i>
              <p>
              Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('cart#page')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Cart
              </p>
            </a>
          </li>
      
         <li class="nav-item">
            <a href="{{route('post#page')}}" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
               Post
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('sale#page')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Sale
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('hotitem#page')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Hot Item
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('trendpost#page')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Trend Post
              </p>
            </a>
          </li>
          <li class="nav-item">
           <form action="{{route('logout')}}" method="POST">
        @csrf 
        <button type="submit" class="nav-link btn btn-danger ">
            <i class="fas fa-sign-out-alt text-white"></i>
            <p class="text-white">
              Logout
            </p>
          </button>
         </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      @yield('content')
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="{{asset('../plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('../dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('../dist/js/demo.js')}}"></script>
</body>
</html>
