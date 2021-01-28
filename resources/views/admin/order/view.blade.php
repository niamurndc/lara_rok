@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>Order ID: #{{$order->id}} </div>
</div>
<div class="page-title-actions">
    <a href="/admin/orders" class="btn btn-info">Go Back</a>
</div> 
@endsection

@section('content')
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
  <div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Order Details</h5>
                <p>Name: {{$order->name}}</p>
                <p>Phone: {{$order->phone}}</p>
                <p>Area: {{$order->area}}</p>
                <p>Address: {{$order->address}}</p>
                <p>Subtotal: {{$order->subtotal}}BDT</p>
                <p>Created: {{$order->created_at}}</p>
                <p>Updated: {{$order->updated_at}}</p>

                <h5 class="card-title">Product Details</h5>
                <table class="table">
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>

                  @foreach($order->carts as $cart)
                  <tr>
                    <td>{{$cart->product->title}}</td>
                    <td>{{$cart->product->price}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->product->price * $cart->quantity}}BDT</td>
                  </tr>
                  @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
      <div class="main-card card p-3">
        <h5 class="card-title">Order Status</h5>
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
        <form action="/admin/order/update/{{$order->id}}" method="post">
        @csrf
          <select name="status" class="form-control">
            <option value="0">Processing</option>
            <option value="1">Collecting Products</option>
            <option value="2">Out for delivery</option>
            <option value="3">Trying but failed</option>
            <option value="4">Compelte</option>
          </select>
          <button type="submit" class="btn btn-success mt-2">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection