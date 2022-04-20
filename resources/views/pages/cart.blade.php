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
                  <tr>
                    <td style="width: 35%">
                      <img
                        src="/images/Product Details/product-details-1.jpg"
                        alt=""
                        class="cart-image"
                        style="width: 60%"
                      />
                    </td>
                    <td style="width: 30%">
                      <div class="product-title">Sofa Ternyaman</div>
                      <div class="product-subtitle">by Andy</div>
                    </td>
                    <td style="width: 30%">
                      <div class="product-title">$107</div>
                      <div class="product-subtitle">USD</div>
                    </td>
                    <td style="width: 20%">
                      <a href="#" class="btn btn-remove-cart btn-primary"
                        >Remove</a
                      >
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12"><hr /></div>
            <div class="col-12"><h2 class="mb-4">Shipping Details</h2></div>
          </div>
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <div class="form-group">
                <label for="addressOne">Address 1</label>
                <input
                  type="text"
                  class="form-control"
                  name="addressOne"
                  id="addressOne"
                  value="Serta Camz"
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
                  value="Blok C No.27"
                />
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="province">Province</label>
                <select class="form-control" name="province" id="province">
                  <option value="West Java">West Java</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" name="city" id="city">
                  <option value="Bandung">Bandung</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input
                  type="text"
                  class="form-control"
                  name="postalCode"
                  id="postalCode"
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
                <label for="mobile">Mobile</label>
                <input
                  type="text"
                  class="form-control"
                  name="mobile"
                  id="mobile"
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
              <div class="product-title">$10</div>
              <div class="product-subtitle">Tax</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title">$200</div>
              <div class="product-subtitle">Product Insurance</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">$500</div>
              <div class="product-subtitle">Ship to Jakarta</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title text-success">$500,000</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <a
                href="/success.html"
                class="btn btn-success mt-4 px-4 btn-block"
                >Checkout Now</a
              >
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection