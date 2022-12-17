@extends('layouts.app')

@section('container')
    <div style="background-color: #f8f2ef" class="vh-75 pb-4">
        <div class="">
            <div class="mx-5 pt-3">
                <div class="d-flex mx-5 pt-1">
                    <a href="/product"><img src="{{ asset('pictures/back.svg') }}" style="width: 28px" alt="logo"
                            class="mt-1  ms-5 "></a>
                    </a>
                    <h3 class="text-center ms-2" style="font-family: 'lexend'; font-weight: 600">{{ $maintitle }}</h3>
                </div>


            </div>
        </div>


        <div class="d-flex">
            <div class="card mb-5 mt-2 mx-auto d-none d-md-block shadow p-3 mb-4  rounded"
                style="width: 1000px; background-color: #fedecb">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src={{ asset("storage/{$product['image']}") }} style="width: 350px; height: 350px"
                            alt="Product Picture">
                    </div>
                    <div class="col-md-6 ms-5" style="font-family: 'lexend';">
                        <div class="card-body ">
                            <div class="d-flex">
                                <h3 class="mb-3" style="font-weight: 520">{{ $product['name'] }}</h3> <a
                                    class="ms-2 {{ $product->status == 'sold' ? 'disabled' : '' }}" href="/wishlist"><img
                                        src="{{ asset('pictures/lovekosong.png') }}" style="width: 34px" alt="logo"
                                        class="my-auto me-1 "></a>
                                </a>
                            </div>
                            <h5 style="font-weight: 450">IDR {{ $product['price'] }}</h5>
                            <br>
                            @if ($product['size'] != '0' && $product['size'] != null)
                                <p class="card-text">Size : {{ $product['size'] }}</p>
                            @endif
                            @if ($product['waist'] != '0' && $product['waist'] != null)
                                <p class="card-text">Waist : {{ $product['waist'] }}</p>
                            @endif
                            @if ($product['bust'] != '0' && $product['bust'] != null)
                                <p class="card-text">Bust : {{ $product['bust'] }}</p>
                            @endif
                            @if ($product['length'] != '0' && $product['length'] != null)
                                <p class="card-text">Length : {{ $product['length'] }}</p>
                            @endif
                            <div class="mt-5">
                                <a href="/"
                                    class="btn  align-items-center justify-content-center mx-auto {{ $product->status == 'sold' ? 'disabled' : '' }}"
                                    style="background-color:#fbd0b6; color: white"><b>Add to Cart</b></a>
                                <a href="https://wa.me/6285173380018"
                                    class="btn me-3  align-items-center justify-content-center mx-auto {{ $product->status == 'sold' ? 'disabled' : '' }}"
                                    style="background-color:#ffbd9a; color: white " target="_blank"><b>Buy</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5 d-block d-md-none mx-auto shadow p-3 mb-4  rounded">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                    style="width: 300px; height: 300px" alt="Product Picture">
                <div class="card-body text-center">
                    <h2 class="mb-3">{{ $product['name'] }}</h2>
                    <h6 class="card-text">Size : {{ $product['size'] }}</h6>
                    @if ($product['waist'] != '0')
                        <p class="card-text pt-3">Waist : {{ $product['waist'] }}</p>
                    @else
                        <p class="card-text pt-3">Bust : {{ $product['bust'] }}</p>
                    @endif
                    <p class="card-text">Length : {{ $product['length'] }}</p><br>
                    <a href="https://wa.me/6285173380018"
                        class="btn me-3  align-items-center justify-content-center mx-auto"
                        style="background-color:#516ab0; color: white " target="_blank"><b>Buy</b></a>
                    <a href="/" class="btn  align-items-center justify-content-center mx-auto"
                        style="background-color:#c5cfea; color: white"><b>Add to Cart</b></a>
                </div>
            </div>
        </div>
    </div>
@endsection
