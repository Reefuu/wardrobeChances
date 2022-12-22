@extends('layouts.app')

@section('container')
    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h4 class="text-center my-auto" style="font-family: 'Lexend'; font-weight: 600">
            @if (Request::get('search') && $products->count() != 0)
                {{ $products->count() }} Product(s) Found
            @elseif($products->count() == 0)
                No Products Found
            @else
                ALL PRODUCTS
            @endif
        </h4>
    </div>

    <!-- Control buttons -->
    <div id="myBtnContainer" class="text-center  mt-3">
        <button class="btn btnk active" onclick="filterSelection('all')"> Show all</button>

        @foreach ($categories as $category)
            @if (!$category->trashed())
                <button class="btn btnk" onclick="filterSelection('{{ $category->category_name }}')">
                    {{ ucfirst($category->category_name) }}
                </button>
            @endif
        @endforeach
    </div>

    @if ($products->count() == 0)
        <div class=" mx-auto text-center align-items-center">
            <img src="{{ asset('pictures/notfound.svg') }}" class="card-img-top mx-auto" style="width: 275px; height: 250px"
                alt="Not Found ">
            <br>
            <h3 class="text-center">Oops!</h3>
            <h5>No Result For "{{ Request::get('search') }}"</h5>
            <p> Please make sure you have entered the correct search term and try again.</p>
        </div>
    @endif

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
                                                style="width: 17.5rem; height:27rem; background-color:#ffebdc ;">

                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    class="card-img-top mx-auto" style="width: 275px; height: 250px"
                                                    alt="Product picture">

                                                <div class="card-body">
                                                    <p class="card-title"
                                                        style="font-size: 19PX; text-overflow: ellipsis; overflow: hidden; white-space: nowrap ">
                                                        <b>{{ $product['name'] }}</b>
                                                    </p>
                                                    <p class="card-text">Price : IDR {{ $product['price'] }}</p>
                                                    @if ($product->status == 'sold')
                                                        <p class="text-danger">&nbsp; {{ $product->status }} </p>
                                                    @elseif ($product->status == 'available')
                                                        <p class="text-success">&nbsp; {{ $product->status }} </p>
                                                    @endif


                                                    <div class="d-flex">
                                                        <a href="/product/{{ $product->id }}"
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
@endsection
