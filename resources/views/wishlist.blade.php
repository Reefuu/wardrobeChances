@extends('layouts.app')

@section('container')
    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h4 class="text-center my-auto" style="font-family: 'Lexend'; font-weight: 600">
            @if ($wishlists->count() == 0)
                No Product(s) In Your Wishlist
            @else
                WISHLIST
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
            <h5>There Are No Products In Your Wishlist</h5>
            <p> Please make sure you have added product(s) in your wishlist.</p>
        </div>
    @endif


    <div class="mt-3">
        <div class=" text-left w-100" style="background-color: #ffffff">
            <div class="card-group row mx-auto">
                @foreach ($categories as $category)
                    @foreach ($subcat as $subc)
                        @if ($subc->category_id == $category->id)
                            @foreach ($products as $product)
                                @if ($product->subcat_id == $subc->id)
                                    @foreach ($wishlists as $wishlist)
                                        @if ($wishlist->product_id == $product->id)
                                            <div class="col col-12 mb-3  mx-auto {{ $category->category_name }} filterDiv">
                                                <div class="d-flex rounded shadow" style="background-color:#ffebdc ;">
                                                    <div class="col-md-4 p-2">
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            class="card-img mx-auto" style="width: 400px; height: 300px;"
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

                                                                <form
                                                                    action="{{ route('wishlist.destroy', $wishlist->id) }}"
                                                                    method="POST"
                                                                    class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn" type="submit">
                                                                        <img src="{{ asset('pictures/lovepenuh.png') }}"
                                                                            style="width: 34px"
                                                                            alt="logo"class="my-auto me-1 ">
                                                                    </button>
                                                                </form>
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
                                                                @foreach ($carts as $cart)
                                                                    <?php $checkCart = 0; ?>

                                                                    @if ($cart->product_id == $product->id)
                                                                        <form
                                                                            action="{{ route('cart.destroy', $cart->id) }}"
                                                                            method="POST"
                                                                            class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            @if ($cart->trashed())
                                                                                <button class="btn" type="submit">
                                                                                    <img src="{{ asset('pictures/cartkosong.png') }}"
                                                                                        style="width: 34px"
                                                                                        alt="logo"class="my-auto me-1 ">
                                                                                </button>
                                                                            @else
                                                                                <button class="btn" type="submit">
                                                                                    <img src="{{ asset('pictures/cartpenuh.png') }}"
                                                                                        style="width: 34px"
                                                                                        alt="logo"class="my-auto me-1 ">
                                                                                </button>
                                                                            @endif
                                                                        </form>
                                                                        <?php $checkCart++; ?>
                                                                    @break
                                                                @endif
                                                            @endforeach
                                                            @if ($checkCart == 0)
                                                                <form action="{{ route('cart.store') }}" method="POST"
                                                                    class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ Auth::id() }}">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $product->id }}">
                                                                    <button class="btn" type="submit">
                                                                        <img src="{{ asset('pictures/cartkosong.png') }}"
                                                                            style="width: 34px"
                                                                            alt="logo"class="my-auto me-1 ">
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            <form action="{{ route('transactions.store') }}"
                                                                method="POST"
                                                                class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="total_price"
                                                                    value="{{ $product->price }}">
                                                                <input type="hidden" name="status" value="waiting">
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::id() }}">
                                                                <button
                                                                    class="d-flex btn align-items-center justify-content-center {{ $product->status == 'sold' ? 'disabled' : '' }}"
                                                                    type="submit"
                                                                    style="background-color:#ffbd9a; color: white ">
                                                                    <b>Buy</b>
                                                                </button>
                                                            </form>
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
