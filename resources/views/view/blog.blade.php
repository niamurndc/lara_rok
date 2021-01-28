@extends('layouts.frontend')

@section('title')
<title>{{$blog->title}} | QB Mama</title>
@endsection

@section('content')


<section class="best seller pt-4">
    <div class="container border p-4">
        <img src="/image/blog/{{$blog->cover}}" height="500px" width="100%">

        <h2 class="mt-2">{{$blog->title}}</h2>
        <h6>{{$blog->category->title}}</h6>
        <hr>
        <p>{{$blog->body}}</p>
    </div>
</section>


<section class="best seller mt-3">
  <div class="container border text-center bg-light">
    <h3>আরো পড়তে পারেন</h3>
    <div class="row border">
        @foreach($blogs as $bl)
          <div class="col-md-3 p-2">
            <a href="/blog/view/{{$bl->id}}">
            <img src="/image/blog/{{$bl->cover}}" width="100%" height="150px">
            <h4 class="text-dark">{{$bl->title}}</h4>
            </a>
          </div>
        @endforeach
    </div>
  </div>
</section>

    

@endsection