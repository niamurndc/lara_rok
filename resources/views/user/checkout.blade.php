@extends('layouts.frontend')

@section('title')
<title>Checkout | QB Mama</title>
@endsection

@section('content')

<section class="py-4">
<div class="container bg-light border">
  <h3>Checkout</h3>
  <div class="row border py-3">
    <div class="col-md-4">
      <h4>Your Products</h4>
      <?php $total = 0 ; ?>
      @foreach($carts as $cart)
      <div class="card p-2">
        <h6>{{$cart->product->title}}</h6>
        <h6>Price: {{$cart->product->price}} x {{$cart->quantity}} = {{$cart->product->price * $cart->quantity}}</h6>
        <?php $total = $total + $cart->product->price * $cart->quantity ; ?>
      </div>
      @endforeach

      <div class="card p-3 mt-3">
          <h5>Subotal: {{$total}} Tk</h5>
          <h5>Shipping Cost: 40 Tk</h5>
          <h5>Total: {{$total + 40}} Tk</h5>
      </div>
    </div>
    <div class="col-md-8">
      <h4>Order Details</h4>
      <div class="card p-3">
        <form action="/checkout" method="post">
        @csrf
        <input type="hidden" name="total" value="{{$total}}">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{Auth::user()->name}}" class="form-control">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{Auth::user()->email}}" id="email" class="form-control">
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone" class="form-control">
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control">
          </div>

          <div class="form-group">
            <label for="note">Order Note</label>
            <input type="text" name="note" id="note" class="form-control">
          </div>

          <input type="submit" value="Order" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
</section>
@endsection