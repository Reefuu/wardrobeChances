@extends('layouts.app')

@section('container')
    <div style="background-color: #f8f2ef" class="pb-4">
        <div class="mx-5 pt-3">
            <div class="d-flex mx-5 pt-1">
                <a href="/product">
                    <img src="{{ asset('pictures/back.svg') }}" style="width: 28px" alt="logo" class="mt-1  ms-5 ">
                </a>
                <h3 class="text-center ms-2" style="font-family: 'lexend'; font-weight: 600">{{ $maintitle }}</h3>
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
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="mb-3" style="font-weight: 520">{{ $product['name'] }}</h3>
                                <?php $checkWish = 0; ?>
                                @foreach ($wishlists as $wishlist)
                                    @if ($wishlist->product_id == $product->id)
                                        <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST"
                                            class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            @if ($wishlist->trashed())
                                                <button class="btn" type="submit">
                                                    <img src="{{ asset('pictures/lovekosong.png') }}" style="width: 34px"
                                                        alt="logo"class="my-auto me-1 ">
                                                </button>
                                            @else
                                                <button class="btn" type="submit">
                                                    <img src="{{ asset('pictures/lovepenuh.png') }}" style="width: 34px"
                                                        alt="logo"class="my-auto me-1 ">
                                                </button>
                                            @endif
                                        </form>
                                        <?php $checkWish++; ?>
                                    @break
                                @endif
                            @endforeach
                            @if ($checkWish == 0)
                                <form action="{{ route('wishlist.store') }}" method="POST"
                                    class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn" type="submit">
                                        <img src="{{ asset('pictures/lovekosong.png') }}" style="width: 34px"
                                            alt="logo"class="my-auto me-1 ">
                                    </button>
                                </form>
                            @endif
                        </div>
                        <h5 style="font-weight: 450">IDR {{ $product['price'] }}</h5>
                        <br>
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
                            <?php $checkCart = 0; ?>
                            @foreach ($carts as $cart)
                                @if ($cart->product_id == $product->id)
                                    <form action="{{ route('cart.destroy', $cart->id) }}" method="POST"
                                        class="{{ $product->status == 'sold' ? 'disabled' : '' }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        @if ($cart->trashed())
                                            <button class="btn" type="submit">
                                                <img src="{{ asset('pictures/cartkosong.png') }}" style="width: 34px"
                                                    alt="logo"class="my-auto me-1 ">
                                            </button>
                                        @else
                                            <button class="btn" type="submit">
                                                <img src="{{ asset('pictures/cartpenuh.png') }}" style="width: 34px"
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
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn" type="submit">
                                    <img src="{{ asset('pictures/cartkosong.png') }}" style="width: 34px"
                                        alt="logo"class="my-auto me-1 ">
                                </button>
                            </form>
                        @endif
                        <a href="https://wa.me/6285173380018?text=Hi%20I%20would%20like%20to%20buy%20the%20product%20%20called%20{{ str_replace(' ', '%20', $product->name) }}!"
                            class="d-flex btn me-3 align-items-center justify-content-center {{ $product->status == 'sold' ? 'disabled' : '' }}"
                            style="background-color:#ffbd9a; color: white " target="_blank">
                            <b>Buy</b>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @if ($product->testimonial_id != null)
            @if (!$testimonial->trashed())
                <div class="{{ $product->status == 'sold' ? 'd-block' : 'd-none' }}">
                    <h4>Testimonial : {{ $testimonial->testimonial_desc }} ({{ $testimonial->user->username }})
                    </h4>
                </div>
            @endif
        @endif
        <div class="container">
            <div class="col">
                <label for="floatText" class="mx-4 my-4">
                    <h3>Comment</h3>
                </label>
                <div class="mx-4">
                    <div class="card-group row row-cols-1 row-cols-md-2 g-4">
                        @foreach ($comments as $comment)
                            <div class="col">
                                <div class="card bg-light mb-3">
                                    <div class="card-header">{{ $comment->user->username }}</div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $comment->comments_desc }}</p>
                                        @if ($comment->user_id == Auth::id())
                                            <form action="{{ route('comments.destroy', $comment->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col">
                <label for="floatText" class="mx-4 my-4">
                    <h3>Write A Comment</h3>
                </label>
                <div class="mx-4">
                    <?php $comment = $comments
                        ->where('user_id', Auth::id())
                        ->where('product_id', $product->id)
                        ->first(); ?>
                    @if ($comment == null)
                        <form action="{{ route('comments.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                {{-- <label for="" class="mb-3">Write your comment below</label>
                            <input type="text" name="comments_desc" class="form-control mb-3"> --}}
                                <textarea name="comments_desc" class="form-control mb-3" cols="30" rows="10"
                                    placeholder="write your comment here...."></textarea>
                                @if ($errors->has('comments_desc'))
                                    <p class="text-danger">{{ $errors->first('comments_desc') }}</p>
                                @endif
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-outline-dark">Submit</button>
                        </form>
                    @else
                        <h5 class="text-danger">You've Already Written A Comment, Please Delete It First In Order
                            To Submit A New One</h5>
                    @endif
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
                style="background-color:#c5cfea; color: white">
                <b>Add to Cart</b>
            </a>
        </div>
    </div>
</div>
@endsection
