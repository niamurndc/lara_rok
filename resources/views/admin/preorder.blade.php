@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>All Pre-order</div>
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
            <th>Email</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($preorders as $preorder)
        <tr>
            <td>{{$preorder->id}}</td>
            <td>{{$preorder->name}}</td>
            <td>{{$preorder->email}}</td>
            <td>{{$preorder->product->title}}</td>
            <td>{{$preorder->product->price}}</td>
            
            <td>{{$preorder->created_at}}</td>
            <td>
              <a href="/admin/preorder/delete/{{$preorder->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection