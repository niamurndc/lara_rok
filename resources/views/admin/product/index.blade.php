@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>All Products</div>
</div>
<div class="page-title-actions">
  <a href="/admin/product/add" class="btn btn-info">Add New</a>
</div> 
@endsection

@section('content')
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Best Seller</th>
            <th>Author</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><img src="/image/product/{{$product->image}}" height="60px" width="60px"></td>
            <td>{{$product->title}}</td>
            <td>{{$product->slug}}</td>
            <td>{{$product->price}} TK</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->best}}</td>
            <td>
              @if($product->author_id == null)
                <span>N/A</span>
              @else
                {{$product->author->title}}
              @endif
            </td>
            <td>{{$product->category->title}}</td>
            <td>
              @if($product->brand_id == null)
                <span>N/A</span>
              @else
              {{$product->brand->title}}</td>
              @endif
            <td>
              <a href="/admin/product/edit/{{$product->id}}" class="btn btn-info">Edit</a>
              <a href="/admin/product/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection