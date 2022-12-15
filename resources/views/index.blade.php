@extends('layouts.app')

@section('container')


    <div class="mx-3">
    <img src="pictures/poster.svg" class="rounded-5 img-fluid" alt="...">
    </div>
    <br> </br>
    <h4 class="mx-3" style="font-family: 'Lexend'; font-weight: 800">NEWEST PRODUCTS</h4>
 

    <div class="">
            <div class=" text-center w-100" style="background-color: #ffffff">
                <div class="card-group" >
                    @foreach ($products->reverse() as $product)
                        @if ($loop->iteration < 5)
                            <div class="col-auto col-md-3 {{ $product->subcategory }}" >
                                <div class="ps-3">
                                    <div class="card my-4 shadow me-5 mb-5   rounded" style="width: 17.5rem; height:25rem; background-color:#ffebdc ;">
                                        <img src="{{ asset("pictures/{$product['image']}") }}" class="card-img-top"
                                            style="width: 238.5px; height: 230px" alt="Product picture">
                                        <div class="card-body">
                                            <p class="card-title" style="font-size: 19PX; text-overflow: ellipsis; overflow: hidden; white-space: nowrap "><b>{{ $product['name'] }}</b></p>
                                            <p class="card-text">Price : {{ $product['price'] }}</p>
                                            <div class="d-flex">
                                                <a href="/detailproduct/{{ $product['code'] }}"
                                                    style="background-color:#ffddc3; "
                                                    class="btn align-items-center justify-content-center mx-auto"><b>Shop</b></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    


        @endsection
