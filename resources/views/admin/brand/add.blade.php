@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>Add Brand </div>
</div>
<div class="page-title-actions">
    <a href="/admin/brands" class="btn btn-info">Go Back</a>
</div> 
@endsection

@section('content')
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
  <div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Add New</h5>
                <form action="/admin/brand/add" method="post">
                    @csrf
                    <div class="position-relative form-group"><label for="title" >Brand Title</label><input name="title" id="title" placeholder="Enter brand title" type="text" class="form-control"></div>
                    
                    <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection