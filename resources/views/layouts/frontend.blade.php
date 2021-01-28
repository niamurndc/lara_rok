<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
  @yield('title')
</head>
<body>
    <header>
      <div class="container">
        <div class="row py-3">
          <div class="col-md-4">
            <div class="d-flex title-menu-box align-items-center">
              <div class="d-flex align-items-center title-bars">
                <i class="fa fa-bars" id="toggle-menu"></i>
                <a href="/" class="text-success ml-2 ml-md-4">Q B M</a>
              </div>
              <div class="d-flex d-md-none">
                <a href="/login" class="text-success"><i class="fa fa-user"></i></a>
                <a href="/cart" class="text-success ml-2"><i class="fa fa-shopping-cart"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-5 d-flex justify-content-center">
            <form action="/search" class="form-inline">
              <input type="text" name="search" id="" class="form-control search-input">
              <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="col-md-3 d-none justify-content-end d-md-flex">
            
            @guest
            <a href="/login" class="nav-link text-success"> লগইন </a>
            @else
            <a href="/profile" class="nav-link text-success"> {{Auth::user()->name}} </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link text-success"> লগ-আউট </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            
            @endguest
            <a href="/cart" class="nav-link text-success"><i class="fa fa-shopping-cart"></i></a>
          </div>
        </div>
      </div>
      <div class="down-nav d-none border-bottom d-sm-flex justify-content-center border-top">
        
        <a href="/" class="nav-link text-success">বইসমূহ</a>
        <a href="/products" class="nav-link text-success">পণ্যসমূহ</a>
        <a href="/electronics" class="nav-link text-success">ইলেকট্রনিক্স</a>
        <a href="/" class="nav-link text-success">পেমেন্ট নীতি</a>
        <a href="/" class="nav-link text-success">অভিযোগ করুন</a>
        <a href="/" class="nav-link text-success">ব্লগ</a>
        @guest
        @else
        <a href="/order" class="nav-link text-success">অর্ডারসমূহ</a>
        @endguest
      </div>
    </header>

    <div id="side-menu">
      <div class="side-top d-flex justify-content-start pl-3 border-bottom">
        <h3 class="text-light"><i class="fa fa-arrow-left mr-4" id="hide-menu"></i> QBM</h3>
      </div>
      <div class="sidenav">
        <button class="dropdown-btn">বইসমূহ
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="#">ক্যাটাগরি</a>
          <?php $category = App\Models\Category::where('section', 'book')->get(); ?>
          @foreach($category as $cat)
            <a href="/category/{{$cat->id}}">{{$cat->title}}</a>
          @endforeach
          <a href="#">লেখক</a>
          <?php $authors = App\Models\Author::all(); ?>
          @foreach($authors as $author)
            <a href="/author/{{$author->id}}">{{$author->title}}</a>
          @endforeach
        </div>
        <button class="dropdown-btn">পণ্যসমূহ
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="#">ক্যাটাগরি</a>
          <?php $category = App\Models\Category::where('section', 'book')->get(); ?>
          @foreach($category as $cat)
            <a href="/category/{{$cat->id}}">{{$cat->title}}</a>
          @endforeach
        </div>
        <button class="dropdown-btn">ইলেকট্রনিক্স
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="#">ক্যাটাগরি</a>
          <?php $category = App\Models\Category::where('section', 'book')->get(); ?>
          @foreach($category as $cat)
            <a href="/category/{{$cat->id}}">{{$cat->title}}</a>
          @endforeach
          <a href="#">ব্র্যান্ড</a>
          <?php $brands = App\Models\Brand::all(); ?>
          @foreach($brands as $brand)
            <a href="/brand/{{$brand->id}}">{{$brand->title}}</a>
          @endforeach
        </div>
        <a href="#services">ব্লগ</a>
        <a href="#clients">পেমেন্ট নীতি</a>
        <a href="#contact">অভিযোগ করুন</a>
        @guest
        <a href="/login">লগইন</a>
        @else
        <a href=/order>অর্ডারসমূহ</a>
        <a href="/profile">প্রোফাইল </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">লগ আউট</a>
        
        @endguest
      </div>


    </div>

    <div class="main-body pb-5">
      @yield('content')
    </div>

<footer class="bg-dark text-light">
  <div class="container py-4">
    <div class="row">
      <div class="col-md-4">
        <h1 class="text-success">QBMama</h1>
        <p class="m-0 text-success">An islamic online Business</p>
      </div>
      <div class="col-md-4">
        <h3>About</h3>
        <p class="m-0"><a href="#" class="text-light">About us</a></p>
        <p class="m-0"><a href="#" class="text-light">Terms & conditons</a></p>
        <p class="m-0"><a href="#" class="text-light">Pervacy Policy</a></p>
        <p class="m-0"><a href="#" class="text-light">Payment Policy</a></p>
      </div>
      <div class="col-md-4">
        <h3>Contact</h3>
        <p class="m-0">Magura, Bangladesh</p>
        <p class="m-0">example@gmail.com</p>
        <p class="m-0">Phone: 0187843748</p>
      </div>
      
    </div>
    <div class="row mt-4">
      <div class="col-md-4">
        <p class="m-0">QBMama &copy; All rights reserved 2021</p>
        <p class="m-0">Developed By Niamur Rahman</p>
      </div>
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>

</footer>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script>
  $("#toggle-menu").click(function(){
    $("#side-menu").slideToggle();
  });

  $("#hide-menu").click(function(){
    $("#side-menu").slideUp();
  });
</script>

<script>
  //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

</script>

</body>
</html>