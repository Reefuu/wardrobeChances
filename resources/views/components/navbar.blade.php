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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
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
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
