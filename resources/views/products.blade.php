@extends('layouts.frontend')

@section('title')
<title>Products | QB Mama</title>
@endsection

@section('content')


<section class="best seller pt-4">
    <div class="container border text-center bg-light">
        <h3>পণ্যসমূহ</h3>
        <div class="row border">
          <div class="col-md-3 text-left">
            <h5 class="ml-2 mt-2">ক্যাটাগরিসমূহ</h5>
            <ul class="list-group">
              @foreach($category as $cat)
              <li class="list-group-item p-2"><a href="/category/{{$cat->id}}" class="text-success">{{$cat->title}}</a></li>
              @endforeach
            </ul>

            <h5 class="ml-2 mt-2">ব্র্যান্ডসমূহ</h5>
            <ul class="list-group">
              @foreach($brands as $brand)
              <li class="list-group-item p-2"><a href="/brand/{{$brand->id}}" class="text-success">{{$brand->title}}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-9">
            <div class="row">
              @foreach($best_seller as $book)
                  @include('utility.single')
              @endforeach
            </div>
          </div>
        </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>
    </div>
</section>




    

@endsection