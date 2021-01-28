@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>Customer: {{$user->name}}</div>
</div>
<div class="page-title-actions">
    <a href="/admin/customers" class="btn btn-info">Go Back</a>
</div> 
@endsection

@section('content')
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
  <div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">User Details</h5>
              <form action="/admin/customer/edit/{{$user->id}}" method="post">
              @csrf 
                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                </div>
                <p>Email: <br><b> {{$user->email}} </b></p>
                <div class="form-group">
                  <label for="passwprd">User Passowrd</label>
                  <input type="text" name="password" id="password" class="form-control">
                </div>
                
                <p>Role: <br> <b> {{$user->role}} </b></p>
                <div class="form-group">
                  <label for="role">Change Role</label>
                  <select name="role" id="role" class="form-control">
                    <option value="">Select</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="customer">Customer</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-info">Update</button>
              </form>
                
            </div>
        </div>
    </div>
    
  </div>
</div>
@endsection