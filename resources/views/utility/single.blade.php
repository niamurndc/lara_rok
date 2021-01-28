<div class="col-md-3 p-2">
  <div class="text-center my-2"><a href="/product/{{$book->id}}">
  <img class="card-image" src="/image/product/{{$book->image}}" alt="" height="150px" width="100px">
  <p class="m-0 mt-1 text-dark">{{$book->title}}</p></a>
  <h6>Price: {{$book->price}} tk</h6>
  <a href="/cart/add/{{$book->id}}" class="btn btn-success btn-sm">Add to Cart</a>
  </div>
</div>