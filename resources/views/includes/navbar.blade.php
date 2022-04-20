 <nav
      class="
        navbar navbar-expand-lg navbar-light navbar-store navbar-fixed-top
        fixed-top
      "
      data-aos="fade-down"
    >
      <div class="container">
        <a href="index.html" class="navbar-brand">
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
            <li class="nav-item">
              <a href="#" class="nav-link">Sign up</a>
            </li>
            <li class="nav-item">
              <a href="#" class="btn btn-nav nav-link px-4">Sign In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>