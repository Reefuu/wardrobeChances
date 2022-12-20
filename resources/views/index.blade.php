@extends('layouts.app')

@section('container')
    <div class="mx-3">
        <img src="pictures/poster.svg" class="rounded-5 img-fluid" alt="...">
    </div>
    <br>
    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h3 class="text-center my-auto " style="font-family: 'Lexend'; font-weight: 600">LATEST PRODUCTS</h3>
    </div>
    <div class=" text-center w-100" style="background-color: #ffffff">
        <div class="card-group">
            @foreach ($products as $product)
                @if ($loop->iteration < 5)
                    <div class="col-auto col-md-3 {{ $product->subcategory }}">
                        <div class="ps-3">
                            <div class="card my-4 shadow me-5 mb-5   rounded"
                                style="width: 17.5rem; height:25rem; background-color:#ffebdc ;">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top mx-auto"
                                    style="width: 275px; height: 250px" alt="Product picture">

                                <div class="card-body">
                                    <p class="card-title"
                                        style="font-size: 19PX; text-overflow: ellipsis; overflow: hidden; white-space: nowrap ">
                                        <b>{{ $product['name'] }}</b>
                                    </p>
                                    <p class="card-text">Price : {{ $product['price'] }}</p>
                                    <div class="d-flex">
                                        <a href="/product/{{ $product->id }}" style="background-color:#ffddc3; "
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

    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h3 class="text-center my-auto " style="font-family: 'Lexend'; font-weight: 600">WHAT PEOPLE SAYS</h3>
    </div>

    <div class="card-group ">
    @foreach ($testimonials as $testimoni)
        @if ($loop->iteration < 5)
                <div class="col-auto col-md-3">
                    <div class="ps-3">
                        <div class="card my-4 shadow me-5 mb-4  rounded" style="width: 17.5rem; ">
                            <div class="card-header" style="background-color:#ffebdc ; ">
                                Testimoni
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>{{ $testimoni->testimonial_desc }}</p>
                                    @foreach ($users as $user)
                                        @if ($testimoni->user_id == $user->id)
                                            <footer class="blockquote-footer">{{ $user['name'] }}
                                            </footer>
                                        @endif
                                    @endforeach

                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif
    @endforeach



    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h3 class="text-center my-auto " style="font-family: 'Lexend'; font-weight: 600">ABOUT US</h3>
    </div>
    <div class=" text-center w-100" style="background-color: #ffffff">

        <div class="d-flex mx-auto mt-3">
            <p class="text-center mb-2 px-5 mx-5"> Wardobe Chances is a rework bussiness that engaged in fashion, by using
                clothes that someone no longer wants, then
                we collect and rework it by combining two or more clothing models which will be a clothing
                product with unique new models and designs.</p>
        </div>
        <div class="container text-center ">
            <div class="row">
                <div class="col ps-5 mb-5">
                    <img src="pictures/logo.png" style="width: 250px; height: 250px" alt="Wardrobe Chances' Logo">
                </div>
                <div class="col">
                    <h3 class="mt-4" style="font-family: 'nunito'; font-weight: bold">The Story Behind Our Logo</h3>
                    <p class="px-5">Our logo is made from the word <b>"thrift"</b>, which is one of the activities we do
                        to
                        provide
                        an opportunity to make used clothes it undergoes rework process, so that they can be used again.</p>
                    <h6 class="mb-3" style="color: #ecba91"><i>#ChancesToWear</i></h6>
                </div>

            </div>
        </div>
    @endsection
