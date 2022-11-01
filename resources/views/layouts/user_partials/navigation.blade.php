<!-- <nav class="navbar smart-scroll navbar-expand-lg navbar-light bg-white shadow ">
    <div class="container">
        <a class="navbar-brand mt-2 mt-lg-0" href="/">
            <img src="{{ asset('image/logo.png')}}" height="50" alt="CamHair" loading="CamhairExtesions" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav fs-5">
                <li class="nav-item">
                    <a class="nav-link {{request() -> is('/')? 'active' : ''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request() -> is('shop')? 'active' : ''}}" href="{{route('shopping')}}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request() -> is('blog')? 'active' : ''}}" href="{{route('blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request() -> is('contact')? 'active' : ''}}"
                        href="{{route('contact')}}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request() -> is('order')? 'active' : ''}}"
                        href="{{route('customize.order')}}">Customize Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request() -> is('order')? 'active' : ''}}" href="{{route('product.cart')}}"><i
                            class="fas fa-shopping-cart"></i><sup>{{Cart::count()}}</sup></a>
                </li>
            </ul>
        
        </div>
        <div class="d-flex align-items-center">


            <div class="col-sm">

                @if(Route::has('login'))
                @auth
                @if(Auth::user()->utype === 'ADM')
                <div class="dropdown">
                    <a class="dropdown-toggle log_in_link " href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="rounded-circle" height="35" />
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
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="rounded-circle" height="35" />
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
                
            
                @endif
                @endif
            </div>

        </div>
    </div>
</nav>  -->
<!-- 
 <nav class="navbar smart-scroll navbar-expand-md navbar-dark bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class=" dropdown-item {{request() -> is('/')? 'active' : ''}}" aria-current="page"
                                href="/">Home</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{request() -> is('shop')? 'active' : ''}}"
                                href="{{route('shopping')}}">Shop</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{request() -> is('blog')? 'active' : ''}}"
                                href="{{route('blog')}}">Blog</a>

                        </li>
                        <li>
                            <a class="dropdown-item {{request() -> is('order')? 'active' : ''}}"
                                href="{{route('customize.order')}}">Customize Order</a>
                        </li>
                    </ul>
                </div>

            </ul>
        </div>
        <div class=" navbar-collapse mx-auto order-0">
            <a class="navbar-brand mt-2 mt-lg-0" href="/">
                <img src="{{ asset('image/logo.png')}}" height="70" alt="CamHair" loading="CamhairExtesions" />
            </a>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="text-dark fa-2x nav-link {{request() -> is('order')? 'active' : ''}}"
                        href="{{route('product.cart')}}"><i class="fa-solid fa-bag-shopping"></i>
                        <sup class="fa-sm">{{Cart::count()}}</sup></a>
                </li>

            </ul>

        </div>
    </div>
</nav> -->

<style>
@media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {
        display: none;
    }

    .topnav a.icon {
        float: right;
        display: block;
    }
}

@media screen and (max-width: 600px) {
    .topnav.responsive {
        position: relative;
    }

    .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
}
</style>
<nav class="navbar smart-scroll navbar-expand-lg navbar-light bg-light">
    <div class="container ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class=" dropdown-item {{request() -> is('/')? 'active' : ''}}" aria-current="page"
                                href="/">Home</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{request() -> is('shop')? 'active' : ''}}"
                                href="{{route('shopping')}}">Shop</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{request() -> is('blog')? 'active' : ''}}"
                                href="{{route('blog')}}">Blog</a>

                        </li>
                        <li>
                            <a class="dropdown-item {{request() -> is('order')? 'active' : ''}}"
                                href="{{route('customize.order')}}">Customize Order</a>
                        </li>
                        <li>

                        </li>

                    </ul>
                </div>

            </ul>
            <div class="navbar-nav mr-auto mx-auto order-0">
                <a class="navbar-brand mt-2 mt-lg-0" href="/">
                    <img src="{{ asset('image/logo.png')}}" height="50" alt="CamHair" loading="CamhairExtesions" />
                </a>
            </div>
        </div>
        <div class="navbar-nav ms-auto">

            <a class="position-relative text-dark  nav-link {{request() -> is('order')? 'active' : ''}}" href="{{route('product.cart')}}">
            <i class="fa-solid fa-bag-shopping fa-2x"></i>
                <span class="position-absolute fa-1x start-100 translate-middle badge rounded-pill bg-danger">
                {{Cart::count()}}
                </span>
            </a>
        </div>
        <div class="navbar-nav ">
            <div class="col-sm">

                @if(Route::has('login'))
                @auth
                @if(Auth::user()->utype === 'ADM')
                <div class="dropdown">
                    <a class="dropdown-toggle log_in_link " href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="rounded-circle" height="35" />
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
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="rounded-circle" height="35" />
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


                @endif
                @endif
            </div>
        </div>


    </div>
</nav>