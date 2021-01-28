@extends('layouts.frontend')

@section('title')
<title>Electronics | QB Mama</title>
@endsection

@section('content')

<section class="slider pt-4">
    <div class="container border p-0"> 
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="/photo/coffee.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="best seller pt-4">
    <div class="container border text-center bg-light">
        <h3>ক্যাটাগরিসমূহ</h3>
        <div class="row border">           
            @foreach($category as $cat)
            <div class="col-md-4 px-2 pt-2">
              <a href="/category/{{$cat->id}}">
              <div class="card my-1 p-2">
              <p class="m-0 my-2">{{$cat->title}}</p>
              </div>
              </a>
            </div>
            @endforeach
        </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>
    </div>
</section>

<section class="best seller mt-3">
    <div class="container border text-center bg-light">
        <h3>ব্র্যান্ডসমূহ</h3>
        <div class="row border">           
            @foreach($brands as $brand)
            <div class="col-md-4 px-2 pt-2">
              <a href="/brand/{{$brand->id}}">
              <div class="card my-1 p-2">
              <p class="m-0 my-2">{{$brand->title}}</p>
              </div>
              </a>
            </div>
            @endforeach
        </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>
    </div>
</section>

<section class="best seller mt-3">
    <div class="container border text-center bg-light">
        <h3>বেস্ট সেলার</h3>
        <div class="row border">
            @foreach($best_seller as $book)
                @include('utility.single')
            @endforeach
        </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>
    </div>
</section>


<section class="best seller mt-5">
    <div class="container border text-center bg-light">
    <h3>Mouse</h3>
    <div class="row border">
        @foreach($best_seller as $book)
            @include('utility.single')
        @endforeach
    </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>  
    </div>
</section>



    <section class="best seller mt-3">
      <div class="container border text-center bg-light">
        <h3>Monitor</h3>
        <div class="row border">
            @foreach($best_seller as $book)
                @include('utility.single')
            @endforeach
        </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>
      </div>
    </section>

    

@endsection