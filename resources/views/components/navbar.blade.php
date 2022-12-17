<nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand text-center fs-6 mt-3 ms-3" href="/" style="font-family: 'Lexend'; font-weight: 600">
            <p style="line-height: 0px">Wardrobe</p>
            <p style="line-height: 0px">Chances</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll" style="font-family: 'Lexend'; font-weight: 400">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link {{ $pagetitle == 'Wardrobe Chance' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $pagetitle == 'Products' ? 'active' : '' }}" href="/product">Products</a>
                </li>
                <li class="nav-item ">
                    @auth
                        @if (auth()->user()->status == 'admin')
                            <a class="nav-link {{ $pagetitle == 'Admin' ? 'active' : '' }}" href="/admin">Admin</a>
                        @endif
                    @endauth
                </li>
                <li class="nav-item">
                    @auth
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn   ">Logout</button>
                        </form>
                    @endauth
                    @guest
                        <a class="nav-link" href="/login">Login</a>
                    @endguest
                </li>
                <li class="nav-item">
                    @if (!Auth::check())
                        <a class="nav-link" href="/register">Register</a>
                    @endif
                </li>
            </ul>

            <div class="d-flex me-1 ">
                <form action="/product" method="GET" class="d-flex" role="search" style="height: 45px; width:200px">

                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search">


                    <button class="btn btn-outline-warning btn-search me-1 p-0" type="submit"
                        style="width: 50px; height:45px ">
                        <a href="">
                            <div class="d-flex">
                                <img src="{{ asset('pictures/search.png') }}" width="40px" height="40px"
                                    alt="logo" class="mx-auto">
                            </div>
                        </a>
                        </a>
                    </button>
                </form>
            </div>

            @if (Str::contains(Request::url(), 'wishlist'))
                @if (Auth::check())
                    <a href="/wishlist">
                    @else
                        <a href="/">
                @endif

                <img src="{{ asset('pictures/lovepenuh.png') }}" style="width: 38px" alt="logo"
                    class="my-auto me-1 ">
                </a>
            @else
                @if (Auth::check())
                    <a href="/wishlist">
                    @else
                        <a href="/" onclick="alertWishlist()">
                @endif
                <img src="{{ asset('pictures/lovekosong.png') }}" style="width: 38px" alt="logo"
                    class="my-auto me-1">
                </a>
            @endif

            @if (Str::contains(Request::url(), 'cart'))
                @if (Auth::check())
                    <a href="/cart">
                    @else
                        <a href="/">
                @endif
                <img src="{{ asset('pictures/cartpenuh.png') }}" style="width: 38px" alt="logo"
                    class="my-auto me-1"></a>
                </a>
            @else
                @if (Auth::check())
                    <a href="/cart">
                    @else
                        <a href="/" onclick="alertCart()">
                @endif
                <img src="{{ asset('pictures/cartkosong.png') }}" style="width: 38px" alt="logo"
                    class="my-auto me-1">
                </a>
            @endif
        </div>
    </div>
</nav>

