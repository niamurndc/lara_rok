@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>All Reviews</div>
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
            <th>Star</th>
            <th>Comment</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($reviews as $review)
        <tr>
            <td>{{$review->id}}</td>
            <td>{{$review->name}}</td>
            <td>{{$review->email}}</td>
            <td> <img src="/photo/{{$review->rating}}star.png" width="100px"></td>
            <td>{{$review->body}}</td>
            <td>
              @if($review->status == 0)
              <p class="text-danger m-0">Unapproved</p>
              @else
              <p class="text-success m-0">Approved</p>
              @endif
            </td>
            <td>{{$review->created_at}}</td>
            <td>
              @if($review->status == 0)
              <a href="/admin/review/edit/{{$review->id}}" class="btn btn-success">Approve</a>
              @else
              <a href="/admin/review/edit/{{$review->id}}" class="btn btn-danger">Unpprove</a>
              @endif
              
              <a href="/admin/review/delete/{{$review->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection