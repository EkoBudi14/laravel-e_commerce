<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <!-- logo -->
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="/images/logo.svg" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- navbar -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="ai-home">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        Rewards
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            Sign Up
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">
                            Sign In
                        </a>
                    </li>
                @endguest
            </ul>

            @auth
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="/images/icon_user.png" alt="" class="rounded-circle mr-2 profile-picture">
                            Hi {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                            <a href="{{ route('dashboard-setting-account') }}" class="dropdown-item">Account</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-inline-block mt-2">
                            <img src="/images/icon_cart_filled.svg" alt="">
                            <div class="cart-badge">3</div>
                        </a>
                    </li>
                </ul>

                <!-- NAVBAR MOBILE -->
                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <a href="#" class="nav-link d-inline-block">
                            cart
                        </a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
