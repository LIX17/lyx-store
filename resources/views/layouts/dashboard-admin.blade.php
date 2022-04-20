<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <title>@yield('title')</title>

    @stack('prepend-style')
    <link rel="stylesheet" href="./style/main.scss" />
    <link rel="stylesheet" href="/dist/style/main.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/>
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/admin.png" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ route('admin-dashboard') }}"
              class="list-group-item list-group-item-action"
              >Dashboard</a
            >
            <a
              href="#"
              class="list-group-item list-group-item-action"
              >Products</a
            >
            <a
              href="{{ route('category.index') }}"
              class="list-group-item list-group-item-action {{ request()->is('admin/category*') ? 'active' : ''  }}"
              >Categories</a
            >
            <a
              href="#"
              class="list-group-item list-group-item-action"
              >Transactions</a
            >
            <a
              href="#"
              class="list-group-item list-group-item-action"
              >Users</a
            >
            <a href="/index.html" class="list-group-item list-group-item-action"
              >Sign Out</a
            >
          </div>
        </div>

        <!-- page content -->
        <div id="page-content-wrapper">
          <nav
            class="
              navbar navbar-expand-lg navbar-light navbar-store navbar-fixed-top
              fixed-top
            "
            data-aos="fade-down"
          >
            <div class="container-fluid mb-2">
              <button
                class="btn btn-secondary d-md-none mr-auto mr-2 ml-2"
                id="menu-toggle"
              >
                &laquo; Menu
              </button>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Desktop Menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
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
                      />Hi, LYX</a
                    >
                    <div class="dropdown-menu">
                      <a href="#" class="dropdown-item"
                        >Dashboard</a
                      >
                      <a href="/dashboard-account.html" class="dropdown-item"
                        >Settings</a
                      >
                      <div class="dropdown-divider"></div>
                      <a href="/" class="dropdown-item">Logout</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link d-inline-block mt-2"
                      ><img src="/images/cart.svg" alt="" />
                      <div class="card-badge">2</div></a
                    >
                  </li>
                </ul>

                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a href="#" class="nav-link">Hi, LYX</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">Cart</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <!-- section content -->
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    <script src="/script/navbar-scroll.js"></script>
    @stack('addon-script')
  </body>
</html>
