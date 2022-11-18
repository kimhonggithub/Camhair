

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="pl-5 brand-link">
        <!-- <img src="{{ asset('image/logo.png')}}" height="50" alt="CamHair" loading="CamhairExtesions" />
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span> -->
        <img src="{{ asset('image/logo.png')}}" height="50" alt="CamHair" loading="CamhairExtesions" />
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="{{ auth()->user()->avatar_url }}" id="profileImage" class="img-circle elevation-2" alt="User Image"> -->
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle"
                    height="35" />
            </div>
            <div class="text-white info">
                {{ auth()->user()->name }}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category') }}"
                        class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-border-all"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subcategory') }}"
                        class="nav-link {{ request()->is('admin/subcategory*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-square-plus"></i>
                        <p>
                            Subcategory
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.products') }}"
                        class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                        <i class="nav-icon fa-sharp fa-solid fa-store"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.order') }}"
                        class="nav-link {{ request()->is('admin/order') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-bag-shopping"></i>
                        <p>
                            Order
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('users') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/slider') ? 'menu-open' : '' }} {{ request()->is('admin/feedback') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link  {{ request()->is('admin/slider') ? 'active' : '' }} {{ request()->is('admin/feedback') ? 'active' : ''}}">
                    <i class="fa-solid fa-file nav-icon"></i>
                        <p>
                            Pages
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item pl-2">
                            <a href="{{route('admin.feedback')}}" class="nav-link {{ request()->is('admin/feedback') ? 'active' : '' }}">
                                <i class="nav-icon fa-sharp fa-solid fa-bullhorn"></i>
                                <p>Feedback Image</p>
                            </a>
                        </li>
                        <li class="nav-item pl-2">
                            <a href="{{ route('admin.slider') }}"
                                class="nav-link {{ request()->is('admin/slider') ? 'active' : '' }}">
                                <i class="fa-regular fa-images nav-icon"></i>
                                <p>Slide</p>
                            </a>
                        </li>
                        <li class="nav-item pl-2">
                            <a href="/"
                                class="nav-link">
                                <i class="nav-icon fa-solid fa-eye"></i>
                                <p>
                                Preview
                                </p>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>