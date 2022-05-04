@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
        <div class="container">
            <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
                <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
                >
                <ol class="carousel-indicators">
                    <li
                    class="active"
                    data-target="#storeCarousel"
                    data-slide-to="0"
                    ></li>
                    <li data-target="#storeCarousel" data-slide-to="1"></li>
                    <li data-target="#storeCarousel" data-slide-to="2"></li>
                    <li data-target="#storeCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img
                        src="images/banner-0.jpg"
                        alt="slide-1"
                        class="d-block w-100"
                    />
                    </div>
                    <div class="carousel-item">
                    <img
                        src="images/banner-0.jpg"
                        alt="slide-2"
                        class="d-block w-100"
                    />
                    </div>
                    <div class="carousel-item">
                    <img
                        src="images/banner-0.jpg"
                        alt="slide-3"
                        class="d-block w-100"
                    />
                    </div>
                    <div class="carousel-item">
                    <img
                        src="images/banner-0.jpg"
                        alt="slide-4"
                        class="d-block w-100"
                    />
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        <section class="store-trend-categories">
        <div class="container">
            <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>Trend Categories</h5>
            </div>
            </div>
            <div class="row">
                @php $increment=0; @endphp
                @foreach ($categories as $row)
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $increment+=100 }}">
                        <a href="{{ route('categories-detail', $row->slug) }}" class="component-categories d-block">
                        <div class="categories-image">
                            <img
                            src="{{ Storage::url($row->photo) }}"
                            alt=""
                            class="w-100"
                            />
                        </div>
                        <p class="categories-text">{{ $row->name }}</p>
                        </a>
                    </div>
                @endforeach
                
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
                @php $increment=0; @endphp
                @forelse ($products as $row)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $increment+=100 }}">
                        <a href="{{ route('detail', $row->slug) }}" class="component-products d-block">
                        <div class="card" style="border-radius: 12px">
                            <div class="products-thumbnail">
                            <div
                                class="products-image"
                                style="
                                    @if($row->galleries->count())
                                        background-image: url('{{ Storage::url($row->galleries->first()->url) }}');
                                        background-size: 260px 140px;
                                    @else
                                        background-image: #eee;
                                    @endif                                
                                "
                            ></div>
                            </div>
                            <div
                            class="card-body"
                            style="background-color: #f9f3df !important"
                            >
                            <div class="products-text">{{ $row->name }}</div>
                            <div class="products-price">{{ $row->price }}</div>
                            </div>
                        </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                        Products Are Not Found
                    </div>
                @endforelse            
            
            </div>
        </div>
        </section>
    </div>    
@endsection