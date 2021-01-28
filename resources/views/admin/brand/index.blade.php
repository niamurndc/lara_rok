@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>All Brands</div>
</div>
<div class="page-title-actions">
  <a href="/admin/brand/add" class="btn btn-info">Add New</a>
</div> 
@endsection

@section('content')
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($brands as $brand)
        <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->title}}</td>
            <td>{{$brand->slug}}</td>
            <td>{{$brand->created_at}}</td>
            <td>
              <a href="/admin/brand/edit/{{$brand->id}}" class="btn btn-info">Edit</a>
              <a href="/admin/brand/delete/{{$brand->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection