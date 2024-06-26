  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      {{-- <a href="" class="navbar-brand">
        <img src="{{asset('icon/uutbeef_1.jpg')}}" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Uutbeef</span>
      </a> --}}

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{route('user.home')}}" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{route('cara_pemesanan.index')}}" class="nav-link">Cara Pemesanan</a>
          </li>
          <li class="nav-item">
            <a href="{{route('produk.index')}}" class="nav-link">Produk</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

        <li class="nav-item">
            <a href="{{route('keranjang.show')}}" class="nav-link">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="badge badge-danger navbar-badge">
                    {{$count}}
                </span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
