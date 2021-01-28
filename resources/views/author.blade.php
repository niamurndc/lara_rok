@extends('layouts.frontend')

@section('title')
<title> QB Mama | Authors</title>
@endsection

@section('content')


    
    <section class="best seller pt-5">
      <div class="container border text-center bg-light">
        <h3>লেখক</h3>
        <div >
        <?php $total = 0 ; ?>
          <div class="row border py-2 my-3">
            @foreach($authors as $author)    
                  <div class="col-md-2">
                    <a href="/author/{{$author->id}}" class="text-dark">
                    <img class="rounded-circle" src="/image/author/{{$author->image}}" alt="" height="100px" width="100px">
                    <h6>{{$author->title}}</h6></a>
                  </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>


@endsection