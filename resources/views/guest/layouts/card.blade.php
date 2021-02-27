<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
    <div class="labels">
    </div>
    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
    <div class="caption">
      <h3>{{ $product->name }}</h3>
      <p>{{ $product->price }} $</p>
      <p>
        {{-- <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
        <button type="submit" class="btn btn-primary" role="button">Add to cart</button>
        <a href="http://internet-shop.tmweb.ru/mobiles/iphone_x_64" class="btn btn-default" role="button">More
          about</a>
        <input type="hidden" name="_token" value="8Wr6XQFMw2BfY5pxRG5rXJz468ltwtNEhn1iz91t">
      </form> --}}
      <form action="{{-- {{ route('basket_add', $product) }} --}}" method="POST">
        @csrf
        <button type='submit' class="btn btn-primary" role="button">Basket</button>
          <a href="{{-- {{ route('product', [$product->category->code, $product->code]) }} --}}" class="btn btn-default"
            role="button">More
            about</a>
      </form>

      </p>
    </div>
  </div>
</div>
