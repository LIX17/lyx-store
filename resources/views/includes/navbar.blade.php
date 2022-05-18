 <nav
      class="
        navbar navbar-expand-lg navbar-light navbar-store navbar-fixed-top
        fixed-top
      "
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
          <img src="images/logo.svg" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories') }}" class="nav-link">Categories</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Rewards</a>
            </li>
            @guest
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Sign up</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-nav nav-link px-4">Sign In</a>
              </li>
            @endguest
            @auth
              <!-- Desktop Menu -->
              <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                  <a
                  href="#"
                  id="navbarDropdown"
                  class="nav-link"
                  role="button"
                  data-toggle="dropdown"
                  ><img
                      src="/images/profile.png"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                  />Hi, {{ session()->get('data_user')->name  }}</a
                  >
                  <div class="dropdown-menu">
                  <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                  <a href="{{ route('dashboard-setting-account') }}" class="dropdown-item"
                      >Settings</a
                  >
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link d-inline-block mt-2"
                    ><img src="/images/empty-cart.svg" alt=""
                    /></a>
                </li>
              </ul>
              {{-- mobile menu --}}
              <ul class="navbar-nav d-block d-lg-none">                
                <li class="nav-item"><a href="#" class="nav-link">Cart</a></li>
                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
              </ul>              
            @endauth
            
          </ul>
        </div>
      </div>
    </nav>