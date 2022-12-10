<nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand text-center fs-6 mt-3 ms-3" href="#" style="font-family: 'Lexend'; font-weight: 600">
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
                {{-- <li class="nav-item">
                    @auth
                        @if (auth()->user()->status == 'admin')
                            <a href="/admin" class="nav-link">Transaction</a>
                        @endif
                    @endauth
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link">Logout</a>
                </li>
            </ul>

            <div class="d-flex me-1 ">
                <form action="/" method="GET" class="d-flex" role="search" style="height: 45px; width:200px">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                

                <button class="btn btn-outline-warning me-1 p-0" type="submit" style="width: 50px; height:45px ">
                    <a href="">
                        <div class="d-flex">
                            <img src="{{ asset('pictures/search.png') }}" width="40px" height="40px" alt="logo"
                                class="mx-auto">
                        </div>
                    </a>
                    </a>
                </button>
            </form>
            </div>

            @if (Request::url() === 'http://127.0.0.1:8000/wishlist' ||
                Request::url() === 'http://127.0.0.1:8000/wishlist/' ||
                Request::url() === 'http://127.0.0.1:8000/wishlist/#')
                <a href="/wishlist"><img src="{{ asset('pictures/lovepenuh.png') }}" style="width: 38px" alt="logo"
                        class="my-auto me-1 "></a>
                </a>
            @else
                <a href="/wishlist"><img src="{{ asset('pictures/lovekosong.png') }}" style="width: 38px" alt="logo"
                        class="my-auto me-1"></a>
                </a>
            @endif

            @if (Request::url() === 'http://127.0.0.1:8000/cart' ||
                Request::url() === 'http://127.0.0.1:8000/cart/' ||
                Request::url() === 'http://127.0.0.1:8000/cart/#')
                <a href="/cart"><img src="{{ asset('pictures/cartpenuh.png') }}" style="width: 38px" alt="logo"
                        class="my-auto me-1"></a>
                </a>
            @else
                <a href="/cart"><img src="{{ asset('pictures/cartkosong.png') }}" style="width: 38px" alt="logo"
                        class="my-auto me-1"></a>
                </a>
            @endif


        </div>
    </div>

    <style>
        .navbar .navbar-nav .nav-link:hover {
            color: #fccdac;
        }

        .navbar .navbar-nav .active {
            color: #efa26b;
        }
    </style>


</nav>
