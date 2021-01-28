@extends('layouts.frontend')

@section('title')
<title>Profile | QB Mama</title>
@endsection

@section('content')
<section class="pt-5">
  <div class="container bg-light border">
    <h3>আপনার প্রোফাইল  </h3>
    <div class="row border p-3">
      <div class="col-md-10">
        <h6>নাম: {{Auth::user()->name}}</h6>
        <h6>ইমেইল: {{Auth::user()->email}}</h6>
        <h6>পাসওয়ার্ড পরিবর্তন</h6>
        <form action="/change/password/{{Auth::user()->id}}" method="post">
        @csrf 
          <div class="form-group">
            <input type="password" name="pass" id="pass" class="form-control" placeholder="পাসওয়ার্ড">
            <input type="submit" value="পরিবর্তন" class="btn btn-success mt-2">
          </div>
        </form>
      </div>
      <div class="col-md-2">

      </div>
    </div>
  </div>
</section>
@endsection