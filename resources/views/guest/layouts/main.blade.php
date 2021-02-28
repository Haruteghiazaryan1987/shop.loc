<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Online Shop: @yield('title') </title>

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <script src="/main/js/jquery.min.js"></script>
  <script src="/main/js/bootstrap.min.js"></script>
  <link href="/main/css/bootstrap.min.css" rel="stylesheet">
  <link href="/main/css/starter-template.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('main') }}">Online Shop</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{ route('main') }}">All products</a></li>
          <li><a href="{{ route('categories') }}">Categories</a>
          </li>
          <li><a href="{{ route('basket') }}">Your cart</a></li>
          <li><a href="{{ route('main') }}">Reset project to default state</a></li>
          {{-- <li><a href="http://internet-shop.tmweb.ru/locale/ru">ru</a></li> --}}

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">$<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a></li>
              <li><a href="http://internet-shop.tmweb.ru/currency/USD">$</a></li>
              <li><a href="http://internet-shop.tmweb.ru/currency/EUR">€</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          {{-- <li><a href="http://internet-shop.tmweb.ru/login">Login</a></li> --}}
         
          @if (Route::has('login'))
            {{-- <div class="fixed top-0 right-0 px-6 py-4 sm:block"> --}}
              @auth
              <li><a href="{{ route('logout') }}" {{-- class="text-sm text-gray-700 underline" --}}>Выйти</a></li>
              @else
              <li><a href="{{ route('login') }}" {{-- class="text-sm text-gray-700 underline" --}}>Войти</a></li>

                @if (Route::has('register'))
                <li><a href="{{ route('register') }}" {{-- class="ml-4 text-sm text-gray-700 underline" --}}>Регистрация</a></li>
                @endif
              @endauth
            {{-- </div> --}}
          @endif

        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="starter-template">
      @if (session()->has('success'))
        <p class="alert alert-success">{{ session()->get('success') }}!</p>
      @endif
      @if (session()->has('warning'))
        <p class="alert alert-warning">{{ session()->get('warning') }}!</p>
      @endif
      @yield('content')
    </div>
  </div>
</body>

</html>
