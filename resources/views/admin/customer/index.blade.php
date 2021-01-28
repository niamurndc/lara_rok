@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>All Customers</div>
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
            <th>Registerd</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($customers as $customer)
        <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->created_at}}</td>
            <td>{{$customer->role}}</td>
            <td>
              <a href="/admin/customer/view/{{$customer->id}}" class="btn btn-info">View</a>
              <a href="/admin/customer/delete/{{$customer->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection