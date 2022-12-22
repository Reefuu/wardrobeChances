@extends('layouts.app')

@section('container')
    <div class="p-3 rounded-4 mx-3" style="background-color: #FFD7BA">
        <h4 class="text-center my-auto" style="font-family: 'Lexend'; font-weight: 600">
            @if ($transactions->count() == 0 ||
                ($transactions->where('user_id', Auth::id())->count() == 0 && auth()->user()->status != 'admin'))
                No Product(s) In Your Transactions
            @else
                TRANSACTIONS
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

    @if ($transactions->count() == 0 ||
        ($transactions->where('user_id', Auth::id())->count() == 0 && auth()->user()->status != 'admin'))
        <div class=" mx-auto text-center align-items-center">
            <img src="{{ asset('pictures/notfound.svg') }}" class="card-img-top mx-auto" style="width: 275px; height: 250px"
                alt="Not Found ">
            <br>
            <h3 class="text-center">Oops!</h3>
            <h5>There Are No Product(s) In Your Transactions</h5>
            <p> Please make sure you have bought product(s).</p>
        </div>
    @endif


    <div class="mt-3">
        <div class=" text-left w-100" style="background-color: #ffffff">
            <div class="card-group row row-cols-1 mx-auto">
                @foreach ($categories as $category)
                    @foreach ($subcat as $subc)
                        @if ($subc->category_id == $category->id)
                            @foreach ($products as $product)
                                @if ($product->subcat_id == $subc->id)
                                    @foreach ($transacProds as $transacprod)
                                        @if ($transacprod->product_id == $product->id)
                                            @foreach ($transactions as $transaction)
                                                @if ($transaction->id == $transacprod->transaction_id)
                                                    @if ($transaction->user_id == Auth::id() || auth()->user()->status == 'admin')
                                                        <div
                                                            class="col mb-3 mx-auto {{ $category->category_name }} filterDiv">
                                                            <div class="d-flex rounded shadow"
                                                                style="background-color:#ffebdc ;">
                                                                <div class="col-md-4 p-2">
                                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                                        class="card-img mx-auto"
                                                                        style="width: 400px; height: 300px;"
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


                                                                        </div>

                                                                        <p>IDR {{ $product['price'] }}</p>
                                                                        <p class="card-text">Status :
                                                                            {{ $transaction['status'] }}</p>
                                                                        @if (auth()->user()->status == 'admin')
                                                                            <p class="card-text">
                                                                                Ordered By :
                                                                                {{ $users->where('id', $transaction->user_id)->first()->username }}
                                                                            </p>
                                                                        @endif
                                                                        <p class="card-text">Please inform us about this
                                                                            purchase : <a
                                                                                href="https://wa.me/6285173380018?text=Hi%20I%20would%20like%20to%20buy%20the%20product%20%20called%20{{ str_replace(' ', '%20', $product->name) }}!"
                                                                                style="background-color:#ffbd9a; color: white "
                                                                                class="btn {{ $transaction->status == 'canceled' ? 'disabled' : '' }}"
                                                                                target="_blank">
                                                                                <b>Inform Us</b>
                                                                            </a></p>
                                                                    </div>
                                                                    @if (!$transaction->trashed())
                                                                        @if (auth()->user()->status != 'admin')
                                                                            @if ($transaction->status == 'waiting')
                                                                                <div class="my-2">
                                                                                    <form
                                                                                        action="{{ route('transactions.destroy', $transaction->id) }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger">
                                                                                            Cancel
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="my-2">
                                                                                <form
                                                                                    action="{{ route('transactions.destroy', $transaction->id) }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">
                                                                                        Cancel
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                            <div class="my-2">
                                                                                <div class="d-flex">
                                                                                    <form
                                                                                        action="{{ route('transactions.update', $transaction->id) }}"
                                                                                        method="POST" class="me-2"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <input type="hidden" name="_method"
                                                                                            value="PATCH">
                                                                                        <input type="hidden" name="status"
                                                                                            value="paid">
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary">
                                                                                            Paid
                                                                                    </form>
                                                                                    <form
                                                                                        action="{{ route('transactions.update', $transaction->id) }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <input type="hidden" name="_method"
                                                                                            value="PATCH">
                                                                                        <input type="hidden" name="status"
                                                                                            value="shipped">
                                                                                        <button type="submit"
                                                                                            class="btn btn-warning">
                                                                                            Shipped
                                                                                        </button>
                                                                                    </form>
                                                                                    <form
                                                                                        action="{{ route('transactions.update', $transaction->id) }}"
                                                                                        class="ms-2" method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <input type="hidden" name="_method"
                                                                                            value="PATCH">
                                                                                        <input type="hidden" name="status"
                                                                                            value="delivered">
                                                                                        <button type="submit"
                                                                                            class="btn btn-success">
                                                                                            Delivered
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
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
