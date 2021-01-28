@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>All Orders</div>
</div>
<div class="page-title-actions">
</div> 
@endsection

@section('content')
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Area</th>
            <th>Subtotal</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->Email}}</td>
            <td>{{$order->area}}</td>
            <td>{{$order->subtotal}}</td>
            <td>{{$order->created_at}}</td>
            <td>
              @if($order->status == 0)
                <p class="m-0 text-primary">Proccessing</p>
              @elseif($order->status == 1)
                <p class="m-0 text-secondary">Collecting Product</p>
              @elseif($order->status == 2)
                <p class="m-0 text-warning">Out for delivery</p>
              @elseif($order->status == 3)
                <p class="m-0 text-danger">Trying but failed</p>
              @elseif($order->status == 4)
                <p class="m-0 text-success">Complete</p>
              @endif
            </td>
            <td>
              <a href="/admin/order/view/{{$order->id}}" class="btn btn-info">View</a>
              <a href="/admin/order/delete/{{$order->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection