@extends('layouts.frontend')

@section('title')
<title> QB Mama | Search</title>
@endsection

@section('content')


    
    <section class="best seller pt-5">
      <div class="container border text-center bg-light">
        <h3>Search Results</h3>
        <div >
            @foreach($result as $book)
                <div class="row border py-2 my-3">
                  <div class="col-md-2">
                    <img class="card-image" src="/image/product/{{$book->image}}" alt="" height="150px" width="100px">
                  </div>
                  <div class="col-md-10 text-left">
                    <h5 class="mt-1">{{$book->title}}</h5>
                    <h6>Price: {{$book->price}} tk</h6>
                    <h6>Author: {{$book->author->title}}</h6>
                    <h6>Category: {{$book->category->title}} tk</h6>
                    <a href="/product/{{$book->id}}" class="btn btn-sm btn-outline-success">
                    View details</a>
                    <a href="/cart/add/{{$book->id}}" class="btn btn-sm btn-success">Add to Cart</a>
                  </div>
                </div>
            @endforeach
        </div>
      </div>
    </section>


@endsection