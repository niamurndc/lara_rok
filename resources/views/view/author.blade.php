@extends('layouts.frontend')

@section('title')
<title>{{$author->title}} | QB Mama</title>
@endsection

@section('content')


<section class="best seller pt-4">
    <div class="container border text-center bg-light">
        <h3>{{$author->title}}</h3>
        <div class="row border">
          <div class="col-md-3 text-left extra-sidebar">
            <h5 class="ml-2 mt-2">ক্যাটাগরিসমূহ</h5>
            <ul class="list-group">
              @foreach($categories as $cat)
              <li class="list-group-item p-2"><a href="/category/{{$cat->id}}" class="text-success">{{$cat->title}}</a></li>
              @endforeach
            </ul>

            <h5 class="ml-2 mt-2">লেখকসমূহ</h5>
            <ul class="list-group mb-3">
              @foreach($authors as $auth)
              <li class="list-group-item p-2"><a href="/author/{{$auth->id}}" class="text-success">{{$auth->title}}</a></li>
              @endforeach
            </ul>


          </div>
          <div class="col-md-9">
            <div class="card p-2 bg-success text-light mt-3">
              <div class="row">
                <div class="col-md-3">
                  <img src="/image/author/{{$author->image}}" height="150px" width="150px" class="rounded-circle">
                </div>
                <div class="col-md-9 text-sm-left p-2">
                  <h4>{{$author->title}}</h4>
                  <p>{{$author->bio}}</p>
                </div>
              </div>
            </div>
            <h4 class="mt-3">লেখকের বইসমূহ </h4>
            <div class="row">
              @foreach($books as $book)
                  @include('utility.single')
              @endforeach
            </div>
          </div>
        </div>
    </div>
</section>




    

@endsection