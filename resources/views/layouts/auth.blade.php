<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('images/favicon-32x32.png')}}">
    <link rel="stylesheet" href="/path/to/select2.css">
    <link rel="stylesheet" href="/path/to/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <title>@yield('title')</title>

    {{-- style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
  </head>

  <body>
    {{-- navbar --}}
    @include('includes.navbar-auth')

    {{-- page content --}}
    @yield('content')

    {{-- footer --}}
    @include('includes.footer')

    {{-- script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>
