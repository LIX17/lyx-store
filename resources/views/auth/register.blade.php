@extends('layouts.auth')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <div class="page-content page-auth" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
              <h2>
                Memulai untuk jual beli <br />
                dengan cara terbaru
              </h2>
              <form method="POST" action="" class="mt-3">
                @csrf
                <div class="form-group">
                  <label for="Full Name">Full Name</label>
                  {{-- <input
                    type="text"
                    class="form-control is-valid"
                    v-model="name"
                    autofocus
                  /> --}}
                  <input id="name" 
                    v-model="name"
                    name="name" 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}" 
                    required
                    autocomplete="name"
                    autofocus
                  />

                  @error('name')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Email Address</label>                 
                  <input id="email" 
                    name="email" 
                    v-model="email"
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" 
                    required
                    autocomplete="email"
                    autofocus
                  />

                  @error('email')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input id="password" 
                    name="password"                     
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror"                     
                    required
                    autocomplete="new-password" 
                  />
                  @error('password')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Password Confirmation</label>
                  <input id="password_confirmation" 
                    name="password_confirmation"                     
                    type="password" 
                    class="form-control @error('password_confirmation') is-invalid @enderror"                     
                    required
                    autocomplete="new-password" 
                  />
                  @error('password_confirmation')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Store</label>
                  <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="is_store_open"
                      id="openStoreTrue"
                      v-model="is_store_open"
                      :value="true"
                    />
                    <label for="openStoreTrue" class="custom-control-label">
                      Iya, boleh</label
                    >
                  </div>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="is_store_open"
                      id="openStoreFalse"
                      v-model="is_store_open"
                      :value="false"
                    />
                    <label for="openStoreFalse" class="custom-control-label">
                      Tidak, terima kasih</label
                    >
                  </div>
                </div>

                <div class="form-group" v-if="is_store_open">
                  <label>Shop Name</label>
                  <input 
                    id="store_name"
                    v-model="store_name"
                    name="store_name"
                    type="text" 
                    class="form-control @error('password_confirm') is-invalid @enderror"                                          
                    autocomplete
                    autofocus
                  />
                  @error('store_name')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label>Category</label>
                  <select name="category" class="form-control select2-single">
                    <option value="" selected disabled>Select Category</option>
                    @foreach ($categories as $row)
                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                  </select>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-4">Sign Up now </button>
                <a
                  href="{{ route('login') }}"
                  class="btn btn-outline-secondary btn-block mt-4"
                  >Back to Sign In</a
                >
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('addon-script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
  $(document).ready(function() {
      $('.select2-single').select2();
  });
</script>
<script>
    // Vue.use(Toasted);

    var register = new Vue({
    el: "#register",
    mounted() {
        AOS.init();
        this.$toasted.error(
        "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
        {
            position: "top-center",
            className: "rounded",
            duration: 1000,
        }
        );
    },
    data: {
        name: "",
        email: "",
        password: "",
        is_store_open: true,
        store_name: "",
    },
    });
</script>    
@endpush