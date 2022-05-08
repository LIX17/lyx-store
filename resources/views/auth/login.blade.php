@extends('layouts.auth')

@section('title')
    Store Cart Page
@endsection

@section('content')
     <div class="page-content page-auth">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img
                src="/images/login-placeholder.png"
                alt=""
                class="w-50 mb-4 mb-lg-none"
              />
            </div>
            <div class="col-lg-5">
              <h2>
                Belanja kebutuhan utama, <br />
                lebih mudah
              </h2>
              <form method="POST" action="{{ route('login') }}" class="mt-3">
                @csrf
                <div class="form-group">
                  <label for="Email Address">Email Address</label>
                  <input id="email" name="email" type="email" class="form-control w-75" value="{{ old('email') }}" />

                  @error('email')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input id="password" name="password" type="password" class="form-control w-75" />
                  @error('password')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                {{-- @if (count($errors) > 0)
                    <div class="">
                        <ul class="text-danger" style="margin: 0px">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <button
                  type="submit"
                  class="btn btn-success btn-block w-75 mt-4"
                  >Sign In
                </button>
                <a
                  href="{{ route('register') }}"
                  class="btn btn-outline-secondary btn-block w-75 mt-4"
                  >Sign Up</a
                >
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection