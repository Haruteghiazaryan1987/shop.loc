@extends('layouts.main')

@section('title', 'Product')

@section('content')
<h1>iPhone X 256GB</h1>
<h1>{{-- {{ $product }} --}}</h1>
{{-- {{ print_r($product) }} --}}
<h2>mobile</h2>
<p>Price: <b>1227.01 $</b></p>
<img src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg">
<p>Отличный продвинутый телефон с памятью на 256 gb</p>

<form action="{{ route('not_function' /*'basket_add' , $product*/ ) }}" method="POST">
@csrf
<button type="submit" class="btn btn-success" role="button">Add to Cart</button>
</form>
</div>
@endsection
