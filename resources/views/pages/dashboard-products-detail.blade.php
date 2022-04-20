@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Details
@endsection

@section('content')
    <!-- section content -->
    <div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Syrup</h2>
        <p class="dashboard-subtitle">Product Details</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                <form action="">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Product Name</label>
                            <input
                                type="text"
                                name="product_name"
                                id=""
                                class="form-control"
                                value="La ourze"
                            />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Price</label>
                            <input
                                type="number"
                                name="price"
                                id=""
                                class="form-control"
                                value="200"
                            />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Kategori</label>
                            <select
                                name="category"
                                id=""
                                class="form-control"
                            >
                                <option value="" disabled selected>
                                Select Category
                                </option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Description</label>
                            <textarea name="editor"></textarea>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-12">
                            <button
                            type="submit"
                            class="btn btn-success w-100"
                            >
                            Update Product
                            </button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="gallery-container">
                                    <img
                                    src="/images/Product Cart/product-cart-1.png"
                                    alt=""
                                    class="w-100"
                                    />
                                    <a href="#" class="delete-gallery"
                                    ><img src="images/delete.svg" alt=""
                                    /></a>
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="gallery-container">
                                    <img
                                    src="/images/Product Cart/product-cart-1.png"
                                    alt=""
                                    class="w-100"
                                    />
                                    <a href="#" class="delete-gallery"
                                    ><img src="images/delete.svg" alt=""
                                    /></a>
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="gallery-container">
                                    <img
                                    src="/images/Product Cart/product-cart-1.png"
                                    alt=""
                                    class="w-100"
                                    />
                                    <a href="#" class="delete-gallery"
                                    ><img src="images/delete.svg" alt=""
                                    /></a>
                                </div>
                                </div>

                                <div class="col-12">
                                <input
                                    type="file"
                                    id="file"
                                    style="display: none"
                                    multiple
                                />
                                <button
                                    class="btn btn-secondary btn-block mt-2"
                                    onclick="thisFileUpload()"
                                >
                                    Add Photo
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("editor");
    </script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
@endpush