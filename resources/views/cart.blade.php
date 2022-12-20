@extends('layouts.app')

@section('container')
    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h4 class="text-center my-auto" style="font-family: 'Lexend'; font-weight: 600">
            @if ($wishlists->count() == 0)
                No Product(s) In Your Cart
            @else
                CART
            @endif
        </h4>
    </div>

    <!-- Control buttons -->
    <div id="myBtnContainer" class="text-center  mt-3">
        <button class="btn btnk" onclick="filterSelection('all')"> Show all</button>

        @foreach ($categories as $category)
            @if (!$category->trashed())
                <button class="btn btnk" onclick="filterSelection('{{ $category->category_name }}')">
                    {{ ucfirst($category->category_name) }}
                </button>
            @endif
        @endforeach
    </div>

    @if ($wishlists->count() == 0)
        <div class=" mx-auto text-center align-items-center">
            <img src="{{ asset('pictures/notfound.svg') }}" class="card-img-top mx-auto" style="width: 275px; height: 250px"
                alt="Not Found ">
            <br>
            <h3 class="text-center">Oops!</h3>
            <h5>There Are No Products In Your Cart</h5>
            <p> Please make sure you have added product(s) in your cart.</p>
        </div>
    @endif


    <div class="mt-3">
        <div class=" text-left w-100" style="background-color: #ffffff">
            <div class="card-group row row-cols-2 mx-auto">
                @foreach ($categories as $category)
                    @foreach ($subcat as $subc)
                        @if ($subc->category_id == $category->id)
                            @foreach ($products as $product)
                                @if ($product->subcat_id == $subc->id)
                                    @foreach ($carts as $cart)
                                        @if ($cart->product_id == $product->id)
                                            <div
                                                class="col col-12 col-md-6 mb-3  mx-auto {{ $category->category_name }} filterDiv">
                                                <div class="d-flex rounded shadow" style="background-color:#ffebdc ;">
                                                    <div class="col-md-4 p-2">
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            class="card-img mx-auto" style="width: 230px; height: 300px;"
                                                            alt="Product picture">
                                                    </div>
                                                    <div class="col-md-8 ms-3 align-items-stretch">
                                                        <div class="card-body py-3">
                                                            <div class="d-flex">
                                                                <p class="card-title"
                                                                    style="font-size: 19PX; text-overflow: ellipsis; overflow: hidden; white-space: nowrap ">
                                                                    <b>
                                                                        {{ $product['name'] }}
                                                                    </b>
                                                                </p>

                                                                <?php $checkWish = 0; ?>
                                                                @foreach ($wishlists as $wishlist)
                                                                    @if ($wishlist->product_id == $product->id)
                                                                        <form
                                                                            action="{{ route('wishlist.destroy', $wishlist->id) }}"
                                                                            method="POST"
                                                                            class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            @if ($wishlist->trashed())
                                                                                <button class="btn" type="submit">
                                                                                    <img src="{{ asset('pictures/lovekosong.png') }}"
                                                                                        style="width: 34px"
                                                                                        alt="logo"class="my-auto me-1 ">
                                                                                </button>
                                                                            @else
                                                                                <button class="btn" type="submit">
                                                                                    <img src="{{ asset('pictures/lovepenuh.png') }}"
                                                                                        style="width: 34px"
                                                                                        alt="logo"class="my-auto me-1 ">
                                                                                </button>
                                                                            @endif
                                                                        </form>
                                                                        <?php $checkWish++; ?>
                                                                    @break
                                                                @endif
                                                            @endforeach
                                                            @if ($checkWish == 0)
                                                                <form action="{{ route('wishlist.store') }}"
                                                                    method="POST"
                                                                    class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ Auth::id() }}">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $product->id }}">
                                                                    <button class="btn" type="submit">
                                                                        <img src="{{ asset('pictures/lovekosong.png') }}"
                                                                            style="width: 34px"
                                                                            alt="logo"class="my-auto me-1 ">
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>

                                                        <p>IDR {{ $product['price'] }}</p>
                                                        <?php $spaceCount = 0; ?>
                                                        @if ($product['size'] != '0' && $product['size'] != null)
                                                            <p class="card-text">Size : {{ $product['size'] }}</p>
                                                        @else
                                                            <?php $spaceCount++; ?>
                                                        @endif
                                                        @if ($product['waist'] != '0' && $product['waist'] != null)
                                                            <p class="card-text">Waist : {{ $product['waist'] }}
                                                            </p>
                                                        @else
                                                            <?php $spaceCount++; ?>
                                                        @endif
                                                        @if ($product['bust'] != '0' && $product['bust'] != null)
                                                            <p class="card-text">Bust : {{ $product['bust'] }}</p>
                                                        @else
                                                            <?php $spaceCount++; ?>
                                                        @endif
                                                        @if ($product['length'] != '0' && $product['length'] != null)
                                                            <p class="card-text">Length : {{ $product['length'] }}
                                                            </p>
                                                        @else
                                                            <?php $spaceCount++; ?>
                                                        @endif
                                                        @for ($i = 0; $i < $spaceCount - 1; $i++)
                                                            <p>&nbsp;</p>
                                                        @endfor
                                                        <div class="mt-5 d-flex">
                                                                    <form
                                                                        action="{{ route('cart.destroy', $cart->id) }}"
                                                                        method="POST"
                                                                        class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        
                                                                            <button class="btn" type="submit">
                                                                                <img src="{{ asset('pictures/cartpenuh.png') }}"
                                                                                    style="width: 34px"
                                                                                    alt="logo"class="my-auto me-1 ">
                                                                            </button>
                                                                    </form>
                                                
                                                        <a href="https://wa.me/6285173380018?text=Hi%20I%20would%20like%20to%20buy%20the%20product%20%20called%20{{ str_replace(' ', '%20', $product->name) }}!"
                                                            class="d-flex btn align-items-center justify-content-center {{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                            style="background-color:#ffbd9a; color: white "
                                                            target="_blank">
                                                            <b>Buy</b>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endforeach
    </div>
</div>
</div>
@endsection
