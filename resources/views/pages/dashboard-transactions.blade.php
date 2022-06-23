@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transaction
@endsection

@section('content')
    <!-- section content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle">To the infinity and beyond</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12 mt-2">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <a
                                class="nav-link active"
                                id="pills-sell-product"
                                data-toggle="pill"
                                href="#"
                                role="tab"
                                aria-controls="pills-sell"
                                aria-selected="true"
                                >Sell Product</a
                            >
                            </li>
                            <li class="nav-item" role="presentation">
                            <a
                                class="nav-link"
                                id="pills-buy-product"
                                data-toggle="pill"
                                href="#"
                                role="tab"
                                aria-controls="pills-buy"
                                aria-selected="false"                        
                                >Buy Product</a
                            >
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div
                            class="tab-pane fade show active"
                            id="pills-sell"
                            role="tabpanel"
                            aria-labelledby="pills-sell-product"
                            >
                            @foreach ($buy_transactions as $row)
                                <a href="{{ route('dashboard-transactions-detail', $row->id) }}" class="card card-list d-block">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                            <img
                                                class="w-50"
                                                src="{{ Storage::url($row->product->galleries->first()->url ?? '') }}"
                                                alt=""
                                            />
                                            </div>

                                            <div class="col-md-4">{{ $row->product->name }}</div>
                                            <div class="col-md-3">{{ $row->product->user->store_name }}</div>
                                            <div class="col-md-3">{{ $row->created_at }}</div>
                                            <div class="col-md-1 d-none d-md-block">
                                            <img src="/images/arrow-right.svg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach                    
                            </div>
                            <div
                            class="tab-pane fade"
                            id="pills-buy"
                            role="tabpanel"
                            aria-labelledby="pills-buy-product"
                            >
                            @foreach ($buy_transactions as $row)
                                <a href="/dashboard-transaction-details.html" class="card card-list d-block">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                            <img
                                                class="w-50"
                                                src="{{ Storage::url($row->product->galleries->first()->url ?? '') }}"
                                                alt=""
                                            />
                                            </div>

                                            <div class="col-md-4">{{ $row->product->name }}</div>
                                            <div class="col-md-3">{{ $row->product->user->store_name }}</div>
                                            <div class="col-md-3">{{ $row->created_at }}</div>
                                            <div class="col-md-1 d-none d-md-block">
                                            <img src="/images/arrow-right.svg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

@push('addon-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#pills-buy-product").click(function(){
                $("#pills-sell-product").removeClass("active");
                $("#pills-sell").removeClass("show active");
                $("#pills-buy").addClass("show active");
                $(this).addClass("active");                
            });
            $("#pills-sell-product").click(function(){
                $("#pills-buy-product").removeClass("active");
                $("#pills-buy").removeClass("show active");
                $("#pills-sell").addClass("show active");
                $(this).addClass("active");                
            });
        });       
   </script>
@endpush
