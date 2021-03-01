@extends('layouts.main')

@section('title', 'Category ' . $category->name ) 

@section('content')
  <h1> 
    {{ $category->name }} {{ $category->products->count() }}
  </h1>
  <p>
    {{ $category->description }}
  </p>
  <div class="row">
    @foreach ($category->products as $product)
      @include('guest.card',compact('product'))
    @endforeach
  </div>
@endsection
