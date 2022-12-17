@extends('layouts.app')

@section('container')
    <!-- Control buttons -->
    <div id="myBtnContainer" class="text-center  mt-3">
        <button class="btn btnk" onclick="filterSelection('all')">All</button>
        <button class="btn btnk" onclick="filterSelection('categories')">Categories</button>
        <button class="btn btnk" onclick="filterSelection('subcat')">Subcategories</button>
        <button class="btn btnk" onclick="filterSelection('product')">Products</button>
    </div>
    <div class="d-flex mx-auto align-items-center justify-content-center mt-4">
        <a href="{{ route('categories.create') }}" class="categories filterDiv btn btn-outline-dark">
            Create Category
        </a>
        <a href="{{ route('subcategories.create') }}" class="subcat filterDiv btn btn-outline-dark ms-3">
            Create Subcategory
        </a>
        <a href="{{ route('product.create') }}" class="product filterDiv btn btn-outline-dark ms-3">
            Create Product
        </a>
    </div>

    {{-- categories --}}

    <div class="categories filterDiv">
        <h3 class="mx-5 mt-5">All Categories</h3>
        <div class="mx-5 mt-4 table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Category Delete Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $category['category_name'] }}</td>
                            <td>
                                @if ($category->trashed())
                                    Deleted
                                @else
                                    Available
                                @endif
                            </td>
                            <td>
                                <div class="mt-2">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-primary">Update</a>
                                </div>
                                <div class="mt-2">
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')

                                        @if ($category->trashed())
                                            <button type="submit" class="btn btn-success">
                                                Restore </button>
                                        @else
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        @endif


                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- subcat --}}
    <div class="subcat filterDiv">
        <h3 class="mx-5 mt-5">All Subcategories</h3>
        <div class="mx-5 mt-4 table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subcategory Name</th>
                        <th>Category Name</th>
                        <th>Category Delete Status</th>
                        <th>Subcategory Delete Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        @foreach ($subcategories as $subcat)
                            @if ($category['id'] == $subcat['category_id'])
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $subcat['subcat_name'] }}</td>
                                    <td>{{ $category['category_name'] }}</td>
                                    <td>
                                        @if ($category->trashed())
                                            Deleted
                                        @else
                                            Available
                                        @endif
                                    </td>
                                    <td>
                                        @if ($subcat->trashed())
                                            Deleted
                                        @else
                                            Available
                                        @endif
                                    </td>
                                    <td>
                                        <div class="mt-2">
                                            <a href="{{ route('subcategories.edit', $subcat->id) }}"
                                                class="btn btn-primary">Update</a>
                                        </div>
                                        <div class="mt-2">
                                            <form action="{{ route('subcategories.destroy', $subcat->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @if ($subcat->trashed())
                                                    <button type="submit" class="btn btn-success">
                                                        Restore </button>
                                                @else
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- product --}}

    <div class="product filterDiv">
        <h3 class="mx-5 mt-5 ">All Products</h3>
        <div class="mx-5 table-responsive ">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Size</th>
                        <th>Product Color</th>
                        <th>Product Bust</th>
                        <th>Product Length</th>
                        <th>Product Waist</th>
                        <th>Product Price</th>
                        <th>Product Status</th>
                        <th>Product Category</th>
                        <th>Product Subcategory</th>
                        <th>Category Delete Status</th>
                        <th>Subcategory Delete Status</th>
                        <th>Product Delete Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    ?>
                    @foreach ($categories as $category)
                        @foreach ($subcategories as $subcat)
                            @if ($category['id'] == $subcat['category_id'])
                                @foreach ($products as $product)
                                    @if ($product->subcat_id == $subcat->id)
                                        <tr>
                                            <th>{{ $index }}</th>
                                            <?php $index++; ?>
                                            <td><img src="{{ asset('storage/' . $product->image) }}" style="width: 100px"
                                                    alt=""></td>
                                            <td>{{ $product['name'] }}</td>
                                            <td>{{ $product['size'] }}</td>
                                            <td>{{ $product['color'] }}</td>
                                            <td>{{ $product['bust'] }}</td>
                                            <td>{{ $product['length'] }}</td>
                                            <td>{{ $product['waist'] }}</td>
                                            <td>{{ $product['price'] }}</td>
                                            <td>{{ $product['status'] }}</td>
                                            <td>{{ $category['category_name'] }}</td>
                                            <td>{{ $subcat['subcat_name'] }}</td>
                                            <td>
                                                @if ($category->trashed())
                                                    Deleted
                                                @else
                                                    Available
                                                @endif
                                            </td>
                                            <td>
                                                @if ($subcat->trashed())
                                                    Deleted
                                                @else
                                                    Available
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->trashed())
                                                    Deleted
                                                @else
                                                    Available
                                                @endif
                                            </td>
                                            <td>
                                                <div class="mt-2">
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-primary">Update</a>
                                                </div>
                                                <div class="mt-2">
                                                    <form action="{{ route('product.destroy', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($product->trashed())
                                                            <button type="submit" class="btn btn-success">
                                                                Restore </button>
                                                        @else
                                                            <button type="submit" class="btn btn-danger">
                                                                Delete
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
