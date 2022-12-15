@extends('layouts.app')

@section('container')
    <div class="">
        <div class="mx-5 ">
            <div class="d-flex mx-5">
                <a href="/product"><img src="{{ asset('pictures/back.svg') }}" style="width: 28px" alt="logo"
                        class="mt-1  ms-5 "></a>
                </a>
                <h3 class="text-center ms-2" style="font-family: 'lexend'; font-weight: 600">{{ $maintitle }}</h3>
            </div>


        </div>
    </div>


    <div class="d-flex">
        <div class="card mb-5 mt-2 mx-auto d-none d-md-block shadow p-3 mb-4  rounded" style="width: 1000px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src={{ asset("pictures/{$product['image']}") }} style="width: 350px; height: 350px"
                        alt="Product Picture">
                </div>
                <div class="col-md-6 ms-5" style="font-family: 'lexend';>
                <div class="card-body ">
                            <div class="d-flex">
                            <h3 class="mb-3" style="font-weight: 520">{{ $product['name'] }}</h3> <a class="ms-2" href="/wishlist"><img src="{{ asset('pictures/lovekosong.png') }}" style="width: 34px" alt="logo"
                                class="my-auto me-1 "></a>
                        </a>
                        </div>
                            <h5 style="font-weight: 450">Rp {{ $product['price'] }},00</h5>
                            <br>
                            <p class="card-text">Size : {{ $product['size'] }}</p>
                              @if ($product['waist'] != '0')
                    <p class="card-text">Waist : {{ $product['waist'] }}</p>
                @else
                    <p class="card-text">Bust : {{ $product['bust'] }}</p>
                    @endif
                    <p class="card-text">Length : {{ $product['length'] }}</p>
                    <div class="mt-5">
                        <a href="/" class="btn  align-items-center justify-content-center mx-auto"
                            style="background-color:#fedecb; color: white"><b>Add to Cart</b></a>
                        <a href="https://wa.me/6285173380018"
                            class="btn me-3  align-items-center justify-content-center mx-auto"
                            style="background-color:#efc195; color: white " target="_blank"><b>Buy</b></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5 d-block d-md-none mx-auto shadow p-3 mb-4  rounded">
        <img src={{ asset("pictures/{$product['photo']}") }} class="card-img-top" style="width: 300px; height: 300px"
            alt="Product Picture">
        <div class="card-body text-center">
            <h2 class="mb-3">{{ $product['name'] }}</h2>
            <h6 class="card-text">Size : {{ $product['size'] }}</h6>
            @if ($product['waist'] != '0')
                <p class="card-text pt-3">Waist : {{ $product['waist'] }}</p>
            @else
                <p class="card-text pt-3">Bust : {{ $product['bust'] }}</p>
            @endif
            <p class="card-text">Length : {{ $product['length'] }}</p><br>
            <a href="https://wa.me/6285173380018" class="btn me-3  align-items-center justify-content-center mx-auto"
                style="background-color:#516ab0; color: white " target="_blank"><b>Buy</b></a>
            <a href="/" class="btn  align-items-center justify-content-center mx-auto"
                style="background-color:#c5cfea; color: white"><b>Add to Cart</b></a>
        </div>
    </div>
    </div>
@endsection
