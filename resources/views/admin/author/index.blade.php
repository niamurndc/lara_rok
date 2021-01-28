@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>All Authors</div>
</div>
<div class="page-title-actions">
  <a href="/admin/author/add" class="btn btn-info">Add New</a>
</div> 
@endsection

@section('content')
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Avatar</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Bio</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($authors as $author)
        <tr>
            <td>{{$author->id}}</td>
            <td> <img src="/image/author/{{$author->image}}" height="60px" width="60px"> </td>
            <td>{{$author->title}}</td>
            <td>{{$author->slug}}</td>
            <td>{{$author->bio}}</td>
            <td>{{$author->created_at}}</td>
            <td>
              <a href="/admin/author/edit/{{$author->id}}" class="btn btn-info">Edit</a>
              <a href="/admin/author/delete/{{$author->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection