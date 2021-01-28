@extends('layouts.frontend')

@section('title')
<title> QB Mama | Cart</title>
@endsection

@section('content')


    
    <section class="best seller pt-5">
      <div class="container border text-center bg-light">
        <h3>Shopping Cart</h3>
        <div >
        <?php $total = 0 ; ?>
            @foreach($carts as $book)
                <div class="row border py-2 my-3">
                  <div class="col-md-2">
                    <img class="cart-image" src="/image/product/{{$book->product->image}}" alt="" height="150px" width="100px">
                  </div>
                  <div class="col-md-10 text-left">
                    <h5 class="mt-1">{{$book->product->title}}</h5>
                    <h6>Price: {{$book->product->price}} tk</h6>
                    <?php $total = $total + $book->product->price * $book->quantity ; ?>
                    <h6>Quantity: <form id="cartForm" method="get" action="/edit/cart/{{$book->id}}" class="form-inline"> <input type="number" name="quantity" id="" class="cart-input" value="{{$book->quantity}}"></h6>
                    <button type="submit" class="btn btn-sm btn-outline-success">
                    update</button>
                    </form>
                    <a href="/cart/delete/{{$book->id}}" class="btn btn-sm btn-success">Delete</a>
                  </div>
                </div>
            @endforeach
                <div class="row">
                  <div class="col-12 text-md-right pr-4 pb-4">
                    <h4>Subotal: {{$total}} Tk</h4>
                    <h4>Shipping Cost: 40 Tk</h4>
                    <h4>Total: {{$total + 40}} Tk</h4>
                    <a href="/checkout" class="btn btn-success mt-3">Prceed to chekout</a>
                  </div>
                </div>
        </div>
      </div>
    </section>


@endsection