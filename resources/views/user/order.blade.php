@extends('layouts.frontend')

@section('title')
<title>Order | QB Mama</title>
@endsection

@section('content')

<section class="pt-5">
  <div class="container bg-light border">
    <h3>আপনার অর্ডারসমূহ </h3>
    @foreach($orders as $order)
    <div class="row border p-3">
      <div class="col-md-10">
        <h5>ID: #{{$order->id}}</h5>
        <h6>নাম: {{$order->name}}</h6>
        <h6>ইমেইল: {{$order->email}}</h6>
        <h6>সর্বমোট : {{$order->subtotal}} টাকা </h6>
        <p>সময়: {{$order->created_at}}</p>
      </div>
      <div class="col-md-2">
        অবস্থা 
        @if($order->status == 0)
          <p class="text-primary">Proccessing</p>
        @elseif($order->status == 1)
          <p class="text-secondary">Collecting Product</p>
        @elseif($order->status == 2)
          <p class="text-warning">Out for delivery</p>
        @elseif($order->status == 3)
          <p class="text-danger">Trying but failed</p>
        @elseif($order->status == 4)
          <p class="text-success">Complete</p>
        @endif
        <a href="/order/view/{{$order->id}}" class="btn btn-success">দেখুন </a>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection