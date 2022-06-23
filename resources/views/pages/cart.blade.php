@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name &amp; Seller</th>
                    <th>Price</th>
                    <th>Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $total = 0;
                  @endphp
                  @foreach ($carts as $row)
                    <tr>                      
                        @if($row->product->galleries)
                          <td style="width: 35%">
                            <img
                              src="{{ Storage::url($row->product->galleries->first()->url) }}"
                              alt=""
                              class="cart-image"
                              style="width: 60%"
                            />
                          </td>
                        @endif
                      <td style="width: 30%">
                        <div class="product-title">{{ $row->product->name }}</div>
                        <div class="product-subtitle">by {{ $row->product->user->store_name }}</div>
                      </td>
                      <td style="width: 30%">
                        <div class="product-title">Rp.{{ number_format($row->product->price,2,',','.') }}</div>
                        <div class="product-subtitle">IDR</div>
                      </td>
                      <td style="width: 20%">
                        <form action="{{ route('cart-delete', $row->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-remove-cart btn-primary">Delete</button>                       
                        </form>                        
                      </td>
                    </tr>
                    @php $total += $row->product->price @endphp
                  @endforeach                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12"><hr /></div>
            <div class="col-12"><h2 class="mb-4">Shipping Details</h2></div>
          </div>
          <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">            
            @csrf
            <input type="hidden" name="total_price" value="{{ $total }}">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_one">Address 1</label>
                  <input
                    type="text"
                    class="form-control"
                    name="address_one"
                    id="address_one"
                    value="Serta Camz"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_two">Address 2</label>
                  <input
                    type="text"
                    class="form-control"
                    name="address_two"
                    id="address_two"
                    value="Blok C No.27"
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
                    value="30701"
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
                    value="Indonesia"
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
                    value="+628 21 1717 7777"
                  />
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12"><hr /></div>
              <div class="col-12"><h2 class="mb-2">Payment Information</h2></div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-4 col-md-2">
                <div class="product-title">Rp.{{ number_format(0,2,',','.') }}</div>
                <div class="product-subtitle">Tax</div>
              </div>
              <div class="col-4 col-md-3">
                <div class="product-title">Rp.{{ number_format(0,2,',','.') }}</div>
                <div class="product-subtitle">Product Insurance</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title">Rp.{{ number_format(0,2,',','.') }}</div>
                <div class="product-subtitle">Shipping Cost</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title text-success">Rp.{{ number_format($total,2,',','.') }}</div>
                <div class="product-subtitle">Total</div>
              </div>
              <div class="col-8 col-md-3">
                <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Checkout Now</button>                
              </div>
            </div>
          </form>          
        </div>
      </section>
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