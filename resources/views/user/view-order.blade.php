@extends('layouts.frontend')

@section('title')
<title>Order #{{$order->id}} | QB Mama</title>
@endsection

@section('content')
<section class="pt-5">
  <div class="container bg-light border">
    <h3>অর্ডার: #{{$order->id}}  </h3> 
    <a href="/order" class="btn btn-success btn-sm mb-2">Back</a>
    <div class="row border p-3">
      <div class="col-md-10">
        <h6>নাম: {{$order->name}}</h6>
        <h6>ইমেইল: {{$order->email}}</h6>
        <h6>মোবাইল : {{$order->phone}}</h6>
        <h6>ঠিকানা  : {{$order->address}}</h6>
        <h6>সর্বমোট : {{$order->subtotal}} টাকা </h6>
        <h6>সময়: {{$order->created_at}}</h6>

        <br>
        <h5>পণ্যের বিবরণ</h5>
        <table class="table">
          <tr>
            <th>পণ্যের নাম</th>
            <th>দাম</th>
            <th>পরিমান</th>
            <th>মোট</th>
          </tr>

          @foreach($order->carts as $cart)
          <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}} টাকা</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->product->price * $cart->quantity}} টাকা</td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="col-md-2">

      </div>
    </div>
  </div>
</section>
@endsection