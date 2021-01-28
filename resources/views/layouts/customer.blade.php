<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="/css/style.css">
  @yield('title')
</head>
<body>

  <div class="menu bg-dark text-light px-3 px-lg-5">
    <div class="row">
      <div class="col-md-3 text-lg-left text-center py-sm-2"><a href="/" class="navbar-brand"><img src="/img/logo1.png" class="main-top-logo" alt="logo"></a></div>
      <div class="col-md-6">
        <form action="/search" method="get">
          <div class="input-group my-2">
            <input type="text" name="key" class="form-control" placeholder="Search product..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-success" type="submit" id="button-addon2">Search</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-3 d-flex justify-content-lg-end justify-content-center py-sm-2 cart-log">
        @guest 
          <a href="/login" class="nav-link"><i class="fa fa-user-circle"></i> Sign in</a>
        @else
          <a href="/profile" class="nav-link"><i class="fa fa-user-circle"></i> Profile</a>
          <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link"><i class="fa fa-signout"></i> Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        @endguest
        <?php 
            $items = 0; 
            session_start();
            $sid = session_id();
            $item = App\Models\Cart::where('skey', $sid)->where('is_order', 0)->get();
            foreach($item as $i){
              $items = $items + $i->quantity;
            }
        ?>
        <a href="/cart" class="nav-link"><i class="fa fa-cart-plus"></i> Cart <span class="badge badge-success">{{$items}}</span></a>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/shop">All</a>
        </li>
        <?php $cats = App\Models\Category::where('parent', null)->get(); ?>
        @foreach($cats as $cat)
        <li class="nav-item">
          <a class="nav-link" href="/category/{{$cat->slug}}">{{$cat->title}}</a>
        </li>
        @endforeach
      </ul>
    </div>
  </nav>

  

  @yield('content')

  <footer class="bg-dark text-light p-4 text-xs-center">
    <div class="row">
      <div class="col-md-6 pt-2">
        <img src="/img/logo1.png" alt="" class="logo1">
        <p>Sodaikhana &copy; All right reserved - 2020</p>
        <a href="#" class="btn btn-outline-success btn-sm mt-2">facebook/sodaikhana</a>
      </div>
      <div class="col-md-3 pt-2">
        <h5>Location</h5>
        <p class="m-0">Phone: 0294394390</p>
        <p class="m-0">Address: Tangail</p>
      </div>
      <div class="col-md-3 pt-2">
        <h5>About Us</h5>
        <p class="m-0">Terms & conditons</p>
        <p class="m-0">About Us</p>
        <p class="m-0">Pirvecy Policy</p>
        <p class="m-0">Contact Us</p>
      </div>
    </div>
  </footer>

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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