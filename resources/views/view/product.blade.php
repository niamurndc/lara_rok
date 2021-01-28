@extends('layouts.frontend')

@section('title')
<title>{{$product->title}} | QB Mama</title>
@endsection

@section('content')


<section class="best seller pt-4">
    <div class="container border text-center bg-light p-4">
        <div class="row">
          <div class="col-md-9">
            <div class="row border py-4">
              <div class="col-md-5">
                <img src="/image/product/{{$product->image}}" alt="Product Image" class="single-product-img">
              </div>
              <div class="col-md-7 text-left">
                <h3>{{$product->title}}</h3>
                <p>লেখক - <a class="text-success" href="/author/{{$product->author_id}}">{{$product->author->title}}</a></p>
                <h6>ক্যাটাগরি: {{$product->category->title}}</h6>
                @if($product->best == 'on')
                <span class="best-seller">Best Seller</span>
                @endif
                <h3 class="my-3">Tk: {{$product->price}}</h3>
                <a href="/cart/add/{{$product->id}}" class="btn btn-success">Add to Cart</a>
                @if($product->stock == 0)
                <a href="/preorder/add/{{$product->id}}" class="btn btn-success">Pre Order</a>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-3 text-left extra-sidebar">
            <h6 class="mt-3">Cash on Delivery</h6>
            <h6 class="mt-3">Delivery charge 50 Tk</h6>
            <h6 class="mt-3">7 Days return</h6>
          </div>
        </div>
    </div>
</section>

<section class="best seller mt-3">
  <div class="container border text-center bg-light">
    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active text-success" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">সংক্ষিপ্ত বিবরণ</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link text-success" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">লেখক সম্পর্কে</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active text-dark bg-light py-3 text-left" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">{{$product->desc}}</div>
      <div class="tab-pane fade text-dark bg-light py-3 text-left" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="media">
          <img src="/image/author/{{$product->author->image}}" alt="author image" height="80px" width="80px" class="rounded-circle">
          <div class="media-body ml-3">
            <h5 class="mt-0">{{$product->author->title}}</h5>
            <p>{{$product->author->bio}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="best seller mt-3">
  <div class="container border text-center bg-light">
    <h3>এই বইগুলি মানুষ পড়ে</h3>
    <div class="row border">
        @foreach($books as $book)
            @include('utility.single')
        @endforeach
    </div>
  </div>
</section>

<section class="best seller mt-3">
  <div class="container border text-center bg-light">
    <h3>রিভিউ ও মতামত</h3>
    <div class="row border">
        <div class="col-12">
          <div class="card p-3 text-left">
            @guest 
            <h5>আপনার রিভিউ বা মতামত  দিতে লগইন করুন </h5>
            <a href="/login" class="btn btn-success">লগইন</a>
            @else
            <h5>আপনার রিভিউ দিন</h5>
            <form action="/review/add/{{$product->id}}" method="POST">
            @csrf 
              <select name="rating" class="form-control mb-2" required>
                <option value="">রেটিং দিন</option>
                <option value="1">1 Star</option>
                <option value="2">2 Star</option>
                <option value="3">3 Star</option>
                <option value="4">4 Star</option>
                <option value="5">5 Star</option>
              </select>

              <textarea name="body" rows="4" class="form-control">আপনার রিভিউ লিখুন</textarea>

              <input type="submit" value="Submit" class="btn btn-success mt-2">
            </form>
          </div>
          @endguest
        </div>
        @foreach($ratings as $rating)
        <div class="col-12 text-left">
          <div class="card p-3">
            <h6 class="mt-2">{{$rating->name}}</h6>
            <span>Ratings: <img src="/photo/{{$rating->rating}}star.png" width="100px"> </span>
            <p class="mt-2">{{$rating->body}}</p>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</section>




    

@endsection