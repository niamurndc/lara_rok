@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>Edit Author </div>
</div>
<div class="page-title-actions">
    <a href="/admin/authors" class="btn btn-info">Go Back</a>
</div> 
@endsection

@section('content')
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
  <div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Add New</h5>
                <form action="/admin/author/edit/{{$author->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group"><label for="title" >Author Title</label><input name="title" id="title" type="text" value="{{$author->title}}" class="form-control"></div>
                    
                    <img src="/image/author/{{$author->image}}" height="60px" width="60px" class="mt-2 mb-1">
                    <div class="position-relative form-group"><label for="image" >Author Image</label><input name="image" id="image" type="file" class="form-control"></div>

                    <div class="position-relative form-group"><label for="bio" >Author's Bio</label><textarea name="bio" id="bio" class="form-control" rows="10">{{$author->bio}}</textarea></div>
                    
                    <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection