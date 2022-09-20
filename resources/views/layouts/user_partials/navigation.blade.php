<style>
    .smart-scroll{
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
}
.scrolled-down{
   transform:translateY(-100%); transition: all 0.3s ease-in-out;
}
.scrolled-up{
   transform:translateY(0); transition: all 0.3s ease-in-out;
}
</style>


<nav class="navbar smart-scroll navbar-expand-lg navbar-light bg-white shadow sticky-top ">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="{{ asset('image/logo.png')}}" height="50" alt="CamHair" loading="lazy" />
            </a>

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Customize Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.cart')}}"><i
                            class="fas fa-shopping-cart"></i><sup>{{Cart::count()}}</sup></a>
                </li>
            </ul>
            <!-- <form action="{{route('search.product')}}" class="d-flex" method="GET">
        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button name="submit" class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
        </div>
        <div class="d-flex align-items-center">


            <div class="col-sm">

                @if(Route::has('login'))
                @auth
                @if(Auth::user()->utype === 'ADM')
                <div class="dropdown">
                <a class="dropdown-toggle log_in_link " href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">     
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle" height="35"
                        />
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.category') }}">Categories</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.products') }}">Products</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.slider') }}">Slider</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.order') }}">Order</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log
                                Out</a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
                @else
                <div class="dropdown">
                    <a class="dropdown-toggle log_in_link " href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">     
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle" height="35"
                        />
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log
                                Out</a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>

                @endif
                @else
                <a type="button" class="btn btn-outline-primary" href="{{route('login')}}">Log in</a>
                <!-- <a class="log_in_link" href="{{route('login')}}">Log In</a> -->
                <!-- <a class="log_in_link" href="{{route('register')}}">Register</a> -->
                @endif
                @endif
            </div>
       

            <!-- <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
                        alt="Black and White Portrait of a Man" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Logout</a>
                    </li>
                </ul>
            </div> -->

        </div>
    </div>
</nav>



<!-- Full Page Image Header with Vertically Centered Content -->