@extends('layouts.app')

@section('container')
    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h4 class="text-center" style="font-family: 'Lexend'; font-weight: 800">ALL PRODUCTS</h4>
    </div>

    <div>
        <div>

        </div>


    </div>

    <div class="mt-5">
        <div class=" text-center w-100" style="background-color: #ffffff">
            <div class="card-group">
                @foreach ($products as $product)
                    <div class="col col-auto col-md-3 mx-auto">
                        <div class="ps-3">
                            <div class="card mb-3 shadow me-5 mb-5 rounded"
                                style="width: 17.5rem; height:25rem; background-color:#ffebdc ;">
                                <img src="{{ asset("pictures/{$product['image']}") }}" class="card-img-top"
                                    style="width: 238.5px; height: 230px" alt="Product picture">
                                <div class="card-body">
                                    <p class="card-title"
                                        style="font-size: 19PX; text-overflow: ellipsis; overflow: hidden; white-space: nowrap ">
                                        <b>{{ $product['name'] }}</b>
                                    </p>
                                    <p class="card-text">Price : {{ $product['price'] }}</p>
                                    <div class="d-flex">
                                        <a href="/detailproduct/{{ $product['code'] }}" style="background-color:#ffddc3; "
                                            class="btn align-items-center justify-content-center mx-auto"><b>Shop</b></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <!-- Control buttons -->
    <div id="myBtnContainer">
        <button class="btnk active" onclick="filterSelection('all')"> Show all</button>
        <button class="btnk" onclick="filterSelection('cars')"> Cars</button>
        <button class="btnk" onclick="filterSelection('animals')"> Animals</button>
        <button class="btnk" onclick="filterSelection('fruits')"> Fruits</button>
        <button class="btnk" onclick="filterSelection('colors')"> Colors</button>
    </div>

    <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
    <div class="container">
        <div class="filterDiv cars d">BMW</div>
        <div class="filterDiv colors fruits">Orange</div>
        <div class="filterDiv cars">Volvo</div>
        <div class="filterDiv colors">Red</div>
        <div class="filterDiv cars animals">Mustang</div>
        <div class="filterDiv colors">Blue</div>
        <div class="filterDiv animals">Cat</div>
        <div class="filterDiv animals">Dog</div>
        <div class="filterDiv fruits">Melon</div>
        <div class="filterDiv fruits animals">Kiwi</div>
        <div class="filterDiv fruits">Banana</div>
        <div class="filterDiv fruits">Lemon</div>
        <div class="filterDiv animals">Cow</div>
    </div>
    <style>
        .filterDiv {
            display: none;
        }

        .btnk {
            border: none;
            outline: none;
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .btnk.active {
            background-color: #666;
            color: white;
        }
    </style>
@endsection
