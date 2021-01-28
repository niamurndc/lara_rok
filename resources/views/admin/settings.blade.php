@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>Settings </div>
</div>
<div class="page-title-actions">
    <a href="/admin/home" class="btn btn-info">Go Back</a>
</div> 
@endsection

@section('content')
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
  <div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Site settings</h5>
                <form action="/admin/setting" method="post">
                    @csrf
                    <div class="position-relative form-group"><label for="title" >Site Title</label><input name="title" id="title" type="text" class="form-control" value="{{$set->title}}"></div>

                    <div class="position-relative form-group"><label for="slogan" >Site Slogan</label><input name="slogan" id="slogan" type="text" class="form-control" value="{{$set->slogan}}"></div>

                    <div class="position-relative form-group"><label for="ship" >Shipping Charge</label><input name="ship" id="ship" type="number" class="form-control" value="{{$set->ship}}"></div> 
                    
                    <button type="submit" class="mt-1 btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection