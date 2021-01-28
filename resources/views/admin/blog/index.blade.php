@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>All Blogs</div>
</div>
<div class="page-title-actions">
  <a href="/admin/blog/add" class="btn btn-info">Add New</a>
</div> 
@endsection

@section('content')
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($blogs as $blog)
        <tr>
            <td>{{$blog->id}}</td>
            <td><img src="/image/blog/{{$blog->cover}}" height="60px" width="60px"></td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->slug}}</td>
            <td>{{$blog->category->title}}</td>
            <td>{{$blog->created_at}}</td>
            <td>
              <a href="/admin/blog/edit/{{$blog->id}}" class="btn btn-info">Edit</a>
              <a href="/admin/blog/delete/{{$blog->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection