@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection

@section('content')
  <div class="page-content page-details">
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
                <li class="breadcrumb-item active">Product Details</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="store-gallery" id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" data-aos="zoom-in">
            <transition name="slide-fade" mode="out-in">
              <img
                :src="photos[activePhoto].url"
                :key="photos[activePhoto].id"
                class="w-100 main-image"
                alt=""
              />
            </transition>
          </div>
          <div class="col-lg-2">
            <div class="row">
              <div
                class="col-3 col-lg-12 mt-2 mt-lg-0"
                v-for="(photo, index) in photos"
                :key="photo.id"
                data-aos="zoom-in"
                data-aos-delay="80"
              >
                <a href="#" @click="changeActive(index)"
                  ><img
                    :src="photo.url"
                    class="w-100 thumbnail-image"
                    :class="{ active:index == activePhoto }"
                    alt=""
                /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
      <section class="store-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <h1>Sofa Ternyaman</h1>
              <div class="owner">By KONZ</div>
              <div class="price">$199</div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
              <a
                href="/cart.html"
                class="
                  btn btn-block btn-success
                  text-white
                  mb-2
                  px-4
                  rounded
                  border border-white
                "
                >Add to Cart</a
              >
            </div>
          </div>
        </div>
      </section>

      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>
                LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                <br /><br />
                LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
                LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="store-review">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8 mt-3 mb-3">
              <h5>Customer Review (2)</h5>
              <ul class="list-unstyled">
                <li class="media">
                  <img
                    src="/images/guest-pic.png"
                    alt=""
                    class="mr-3 rounded-circle"
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Konz</h5>
                    LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM
                    IPSUM
                  </div>
                </li>
                <li class="media">
                  <img
                    src="/images/guest-pic.png"
                    alt=""
                    class="mr-3 rounded-circle"
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Konz 2</h5>
                    LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM
                    IPSUM
                  </div>
                </li>
                <li class="media">
                  <img
                    src="/images/guest-pic.png"
                    alt=""
                    class="mr-3 rounded-circle"
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Konz 3</h5>
                    LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM
                    IPSUM
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            {
              id: 1,
              url: "/images/Product Details/product-details-1.jpg",
            },
            {
              id: 2,
              url: "/images/Product Details/product-details-2.jpg",
            },
            {
              id: 3,
              url: "/images/Product Details/product-details-3.jpg",
            },
            {
              id: 4,
              url: "/images/Product Details/product-details-4.jpg",
            },
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush