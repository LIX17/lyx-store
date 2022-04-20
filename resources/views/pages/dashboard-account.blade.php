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
              <form action="">
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
                            value="Jhonz"
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
                            value="Jhonz17@mail.com"
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
                          <select
                            class="form-control"
                            name="province"
                            id="province"
                          >
                            <option value="West Java">West Java</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="city">City</label>
                          <select
                            class="form-control"
                            name="city"
                            id="city"
                          >
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