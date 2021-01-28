@extends('layouts.frontend')

@section('title')
<title>Blog | QB Mama</title>
@endsection

@section('content')

<section>
  <div class="container">
    <h3 class="ml-3">আমাদের ব্লগ</h3>
    @foreach($blogs as $blog)
    <div class="row border p-2">
      <div class="col-md-4">
        <img src="/image/blog/{{$blog->cover}}" alt="Blog cover" width="100%" height="230px">
      </div>
      <div class="col-md-8 px-2">
        <h4>{{$blog->title}}</h4>
        <p class="text-justify">{{ str_limit($blog->body, 500, '...')}}</p>
        <a href="/blog/view/{{$blog->id}}" class="btn btn-success mt-1">Read More</a>
      </div>
    </div>
    @endforeach
  </div>
</section>

@endsection