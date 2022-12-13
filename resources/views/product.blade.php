@extends('layouts.app')

@section('container')
    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h4 class="text-center" style="font-family: 'Lexend'; font-weight: 600">
            @if (Request::get('search') && $products->count() != 0)
                {{ $products->count() }} Product(s) Found
            @elseif($products->count() == 0)
                No Products Found
            @else
                ALL PRODUCTS
            @endif
        </h4>
    </div>



    @if ($products->count() == 0)
        <div class="d-flex mx-auto text-center">
            <h3>ANJROTTTT WOIII GADA PRODUKK GIMANA NI GESSSS ANJROTTTT</h3>
        </div>
    @endif

    <!-- Control buttons -->
    <div id="myBtnContainer" class="text-center  mt-3">
        <button class="btn btnk active" onclick="filterSelection('all')"> Show all</button>
        <button class="btn btnk" onclick="filterSelection('tops')"> Cars</button>
        <button class="btn btnk" onclick="filterSelection('pants')"> Animals</button>
        <button class="btn btnk" onclick="filterSelection('accessories')"> Fruits</button>
    </div>

    <div class="mt-3">
        <div class=" text-center w-100" style="background-color: #ffffff">
            <div class="card-group">
                @foreach ($categories as $category)
                    @foreach ($subcat as $subc)
                        @if ($subc->category_id == $category->id)
                            @foreach ($products as $product)
                                @if ($product->subcat_id == $subc->id)
                                    <div class="col col-auto col-md-3 mx-auto {{ $category->category_name }} filterDiv">
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
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>





    <style>
        .filterDiv {
            display: none;
        }

        .btn.btnk {
            border: none;
            outline: none;
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .btn.active {
            background-color: #666;
            color: white;
        }
    </style>
@endsection