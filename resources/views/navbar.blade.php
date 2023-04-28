<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- //<meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased text-center">
       <!-- navigation bar -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
        
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="{{url('home')}}">اضافة قرض</a>
          </li>
          <li class="nav-item">
           
            <a class="nav-link" href=" {{url('add_payment')}}">تسديد دفعة</a>
          </li>

          <li class="nav-item">
           
            <a class="nav-link" href=" {{url('search_in_loans')}}">بحث عن قرض</a>
          </li>

        </ul>
      </div>
    </div>
  </div>
  <!-- navigation bar ends here -->

  @yield('content')

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    </body>
</html>
