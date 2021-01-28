@extends('layouts.frontend')

@section('title')
<title> QB Mama | An online islamic bookshop</title>
@endsection

@section('content')
<section class="slider pt-4">
    <div class="container border p-0"> 
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="/photo/coffee.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/photo/coffee.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/photo/coffee.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>


<section class="offer pt-2">
    <div class="container p-2">
    <div class="row">
        <div class="col-md-4 p-2">
        <img src="/photo/coffee.jpg" alt="" height="100%" width="100%">
        </div>
        <div class="col-md-4 p-2">
        <img src="/photo/coffee.jpg" alt="" height="100%" width="100%">
        </div>
        <div class="col-md-4 p-2">
        <img src="/photo/coffee.jpg" alt="" height="100%" width="100%">
        </div>
    </div>
    </div>
</section>

<section class="best seller pt-3">
    <div class="container border text-center bg-light">
    <h3>বেস্ট সেলার </h3>
    <div class="row border">
        @foreach($best_seller as $book)
            @include('utility.single')
        @endforeach
    </div>
    <a href="#" class="btn btn-sm btn-success my-2">See more...</a>
    </div>
</section>

<section class="Child mt-3">
    <div class="container p-2">
    <div class="row">
        <div class="col-md-4 p-2">
        <div class="card my-2 p-2">
            <p class="m-0 my-2">Shishuder boi</p>
        </div>
        </div>
        <div class="col-md-4 p-2">
        <div class="card my-2 p-2">
            <p class="m-0 my-2">Shishuder boi</p>
        </div>
        </div>
        <div class="col-md-4 p-2">
        <div class="card my-2 p-2">
            <p class="m-0 my-2">Shishuder boi</p>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="best seller mt-3">
    <div class="container border text-center bg-light">
        <h3>Sirat</h3>
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
    <h3>Islamic</h3>
    <div class="row border">
        @foreach($best_seller as $book)
            @include('utility.single')
        @endforeach
    </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>  
    </div>
</section>

<section class="Child mt-3">
    <div class="container p-2">
        <div class="row">
        <div class="col-md-4 p-2">
            <div class="card my-2 p-2">
            <p class="m-0 my-2">Shishuder boi</p>
            </div>
        </div>
        <div class="col-md-4 p-2">
            <div class="card my-2 p-2">
            <p class="m-0 my-2">Shishuder boi</p>
            </div>
        </div>
        <div class="col-md-4 p-2">
            <div class="card my-2 p-2">
            <p class="m-0 my-2">Shishuder boi</p>
            </div>
        </div>
        </div>
    </div>
</section>

    <section class="best seller mt-3">
      <div class="container border text-center bg-light">
        <h3>Historic</h3>
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
        <h3>Novel</h3>
        <div class="row border">
            @foreach($best_seller as $book)
                @include('utility.single')
            @endforeach
        </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>
      </div>
    </section>

    <section class="Child mt-4">
      <div class="container border text-center bg-light">
        <h3>Author</h3>
        <div class="row border">
            @foreach($authors as $author)
                <div class="col-md-3 p-2">
                    <div class="text-center my-2">
                    <img class="rounded-circle" src="/image/author/{{$author->image}}" alt="" height="150px" width="150px">
                    <p class="m-0 mt-1"><a href="/author/{{$author->slug}}" class="text-dark">{{$author->title}}</a></p>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="#" class="btn btn-sm btn-success my-2">See more...</a>
      </div>
    </section>

@endsection