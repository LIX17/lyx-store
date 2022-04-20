@extends('layouts.app')

@section('title')
    Store Category Page
@endsection

@section('content')
    <div class="page-content page-home">
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Categories</h5>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="images/Trend Category/Gadgets.svg"
                    alt=""
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Gadgets</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="images/Trend Category/Furnitures.svg"
                    alt=""
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Furniture</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="images/Trend Category/Tool.svg"
                    alt=""
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Tools</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="images/Trend Category/Sneaker.svg"
                    alt=""
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Sneaker</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="images/Trend Category/Makeup.svg"
                    alt=""
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Make Up</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="images/Trend Category/Baby.svg"
                    alt=""
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Baby</p>
              </a>
            </div>
          </div>
        </div>
      </section>
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>New Products</h5>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card" style="border-radius: 12px">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        background-image: url('/images/Product images/watch.jpg');
                      "
                    ></div>
                  </div>
                  <div
                    class="card-body"
                    style="background-color: #f9f3df !important"
                  >
                    <div class="products-text">Apple Watch</div>
                    <div class="products-price">$400</div>
                  </div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card" style="border-radius: 12px">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        background-image: url('/images/Product images/orange-shoes.jpg');
                      "
                    ></div>
                  </div>
                  <div
                    class="card-body"
                    style="background-color: #f9f3df !important"
                  >
                    <div class="products-text">Orenji</div>
                    <div class="products-price">$250</div>
                  </div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card" style="border-radius: 12px">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        background-image: url('/images/Product images/drone.jpg');
                      "
                    ></div>
                  </div>
                  <div
                    class="card-body"
                    style="background-color: #f9f3df !important"
                  >
                    <div class="products-text">Baling-baling besi</div>
                    <div class="products-price">$4000</div>
                  </div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card" style="border-radius: 12px">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        background-image: url('/images/Product images/dolls.jpg');
                      "
                    ></div>
                  </div>
                  <div
                    class="card-body"
                    style="background-color: #f9f3df !important"
                  >
                    <div class="products-text">Teddy Bear</div>
                    <div class="products-price">$20</div>
                  </div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card" style="border-radius: 12px">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        background-image: url('/images/Product images/sofa.jpg');
                      "
                    ></div>
                  </div>
                  <div
                    class="card-body"
                    style="background-color: #f9f3df !important"
                  >
                    <div class="products-text">Soft-a</div>
                    <div class="products-price">$600</div>
                  </div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card" style="border-radius: 12px">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        background-image: url('/images/Product images/powder.jpg');
                      "
                    ></div>
                  </div>
                  <div
                    class="card-body"
                    style="background-color: #f9f3df !important"
                  >
                    <div class="products-text">Cocoa Powder</div>
                    <div class="products-price">$30</div>
                  </div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="700"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card" style="border-radius: 12px">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        background-image: url('/images/Product images/placemat.jpg');
                      "
                    ></div>
                  </div>
                  <div
                    class="card-body"
                    style="background-color: #f9f3df !important"
                  >
                    <div class="products-text">Placemat</div>
                    <div class="products-price">$10</div>
                  </div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card" style="border-radius: 12px">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        background-image: url('/images/Product images/black-shoes.jpg');
                      "
                    ></div>
                  </div>
                  <div
                    class="card-body"
                    style="background-color: #f9f3df !important"
                  >
                    <div class="products-text">Air Nike</div>
                    <div class="products-price">$3000</div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection