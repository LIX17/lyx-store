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
              <form class="mt-3">
                <div class="form-group">
                  <label for="Full Name">Full Name</label>
                  <input
                    type="text"
                    class="form-control is-valid"
                    v-model="name"
                    autofocus
                  />
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <input
                    type="email"
                    class="form-control is-valid"
                    v-model="email"
                  />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" />
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
                  <input type="text" class="form-control" />
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label>Category</label>
                  <select name="category" class="form-control">
                    <option value="" disabled>Select Category</option>
                  </select>
                </div>

                <a href="/dashboard.html" class="btn btn-success btn-block mt-4"
                  >Sign Up now</a
                >
                <a
                  href="/login.html"
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
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted);

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
        name: "LYX",
        email: "test@mail.com",
        password: "",
        is_store_open: true,
        store_name: "",
    },
    });
</script>    
@endpush