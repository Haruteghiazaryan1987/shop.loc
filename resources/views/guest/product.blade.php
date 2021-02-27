@extends('layouts.main')

@section('title', 'Product')

@section('content')
  <h1>iPhone X 256GB</h1>
  <h1>{{ $products }}</h1>
  {{ print_r($products) }};
  <h2>mobile</h2>
  <p>Price: <b>1227.01 $</b></p>
  <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg">
  <p>Отличный продвинутый телефон с памятью на 256 gb</p>

  <form action="{{ route('basket_add', $products) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success" role="button">Add to Cart</button>

    {{-- <input type="hidden" name="_token" value="8Wr6XQFMw2BfY5pxRG5rXJz468ltwtNEhn1iz91t"> --}}
  </form>
  </div>
@endsection
