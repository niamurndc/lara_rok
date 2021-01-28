@extends('layouts.frontend')

@section('title')
<title>{{$category->title}} | QB Mama</title>
@endsection

@section('content')


<section class="best seller pt-4">
    <div class="container border text-center bg-light">
        <h3>{{$category->title}}</h3>
        <div class="row border">
          <div class="col-md-3 text-left extra-sidebar">
            <h5 class="ml-2 mt-2">ক্যাটাগরিসমূহ</h5>
            <ul class="list-group">
              @foreach($categories as $cat)
              <li class="list-group-item p-2"><a href="/category/{{$cat->id}}" class="text-success">{{$cat->title}}</a></li>
              @endforeach
            </ul>

            @if($category->section != 'book')
            <h5 class="ml-2 mt-2">ব্র্যান্ডসমূহ</h5>
            <ul class="list-group mb-3">
              @foreach($brands as $brand)
              <li class="list-group-item p-2"><a href="/brand/{{$brand->id}}" class="text-success">{{$brand->title}}</a></li>
              @endforeach
            </ul>

            @else

            <h5 class="ml-2 mt-2">লেখকসমূহ</h5>
            <ul class="list-group mb-3">
              @foreach($authors as $author)
              <li class="list-group-item p-2"><a href="/author/{{$author->id}}" class="text-success">{{$author->title}}</a></li>
              @endforeach
            </ul>

            @endif

          </div>
          <div class="col-md-9">
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