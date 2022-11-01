<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
                    <a data-toggle="tooltip" data-placement="top" title="Appoinment" href="{{ route('appointments') }}"
                        class="nav-link {{ request()->is('appointments*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                    </a>
        </li>
        <li class="nav-item">
                    <a data-toggle="tooltip" data-placement="top" title="Message" href="{{ route('messages') }}" class="nav-link {{ request()->is('messages') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                      
                    </a>
                </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="rounded-circle" height="35" />
                <span class="ml-1" x-ref="username">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile.edit') }}" x-ref="profileLink">Profile</a>
                <a class="dropdown-item" href="{{ route('profile.edit') }}" x-ref="changePasswordLink">Change Password</a>
                <a class="dropdown-item" href="{{ route('settings') }}">Settings</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            Log out
                        </a>
                    </form>
            </div>
        </li>
    </ul>
</nav>
