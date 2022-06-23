@extends('layouts.dashboard')

@section('title')
    Account Settings
@endsection

@section('content')
    <!-- section content -->
    <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Store Settings</h2>
          <p class="dashboard-subtitle">Make store that profitable</p>
        </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form id="locations" action="{{ route('dashboard-setting-redirect', 'dashboard-setting-account') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                  <div class="card-body">
                    <div
                      class="row mb-2"
                      data-aos="fade-up"
                      data-aos-delay="200"
                    >
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Your Name</label>
                          <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            value="{{ $user->name }}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Your Email</label>
                          <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            value="{{ $user->email }}"
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="addressOne">Address 1</label>
                          <input
                            type="text"
                            class="form-control"
                            name="addressOne"
                            id="addressOne"
                            value="{{ $user->address_one }}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="addressTwo">Address 2</label>
                          <input
                            type="text"
                            class="form-control"
                            name="addressTwo"
                            id="addressTwo"
                            value="{{ $user->address_two }}"
                          />
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="province_id">Province</label>
                          <select class="form-control" name="province_id" id="province_id" v-if="province" v-model="province_id">
                            {{-- <option value="default">Select Province</option> --}}
                            <option v-for="data in province" :value="data.id">@{{ data.name }}</option>
                          </select>
                          <select class="form-control" v-else></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="regencies_id">City</label>
                          <select class="form-control" name="regencies_id" id="regencies_id" v-if="regency" v-model="regencies_id">                    
                            <option v-for="data in regency" :value="data.id">@{{ data.name }}</option>
                          </select>
                          <select class="form-control" v-else></select>                 
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="zip_code">Postal Code</label>
                          <input
                            type="text"
                            class="form-control"
                            name="zip_code"
                            id="zip_code"
                            value="{{ $user->zip_code }}"
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="country">Country</label>
                          <input
                            type="text"
                            class="form-control"
                            name="country"
                            id="country"
                            value="{{ $user->country }}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="phone_number">Phone Number</label>
                          <input
                            type="text"
                            class="form-control"
                            name="phone_number"
                            id="phone_number"
                            value="{{ $user->phone_number }}"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-right">
                        <button
                          type="submit"
                          class="btn btn-success px-5"
                        >
                          Save
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvince();
        },
        data: {
          province: null,
          regency: null,
          province_id: null,
          regencies_id: null,
          selected: 'default'
        },
        methods: {
          getProvince()
          {
            var self = this;
            axios.get('{{ route('api-get-province') }}')
              .then(function(response){
                self.province = response.data;
              })
          },
          getRegency()
          {
            var self = this;
            axios.get('{{ url('api/regency') }}/' + self.province_id)
              .then(function(response){
                self.regency = response.data;
              })
          },
        },
        watch:{
          province_id: function(val, oldVal){
            this.regencies_id = null;
            this.getRegency();
          }
        },
      });      
    </script>
@endpush