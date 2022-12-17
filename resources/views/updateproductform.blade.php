@extends('layouts.app')

@section('container')
    <div class="container">
        <h1 class="mb-3 mt-3 ">Update Product</h1>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            {{-- {{method_field('POST')}} --}}
            @csrf
            {{-- @method('PATCH') --}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="mb-2">
                <label for="" class="mb-1">Product Name</label>
                <input type="text" name="name" class="form-control mb-3" value="{{ $product->name }}">
                @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Size</label>
                <input type="text" name="size" class="form-control mb-3" value="{{ $product->size }}">
                @if ($errors->has('size'))
                    <p class="text-danger">{{ $errors->first('size') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Color</label>
                <input type="text" name="color" class="form-control mb-3" value="{{ $product->color }}">
                @if ($errors->has('color'))
                    <p class="text-danger">{{ $errors->first('color') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Bust</label>
                <input type="text" name="bust" class="form-control mb-3" value="{{ $product->bust }}">
                @if ($errors->has('bust'))
                    <p class="text-danger">{{ $errors->first('bust') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Length</label>
                <input type="text" name="length" class="form-control mb-3" value="{{ $product->length }}">
                @if ($errors->has('length'))
                    <p class="text-danger">{{ $errors->first('length') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Waist</label>
                <input type="text" name="waist" class="form-control mb-3" value="{{ $product->waist }}">
                @if ($errors->has('waist'))
                    <p class="text-danger">{{ $errors->first('waist') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Price</label>
                <input type="text" name="price" class="form-control mb-3" value="{{ $product->price }}">
                @if ($errors->has('price'))
                    <p class="text-danger">{{ $errors->first('price') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Status</label>
                <select name="status" class="form-select mb-3">
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                </select>
            </div>

            <div class="mb-2">
                <label for="" class="mb-3">Category Name</label>
                <input type="text" name="category_name" class="form-control"
                    value="{{ $categories->where('id', $subcategories->where('id', $product->subcat_id)->first->get()->category_id)->first->get()->category_name }}"
                    readonly>
            </div>

            <div class="mb-2">
                <label for="" class="mb-3">Subcategory Name</label>
                <input type="text" name="subcat_name" class="form-control"
                    value="{{ $subcategories->where('id', $product->subcat_id)->first->get()->subcat_name }}" readonly>
            </div>

            <input type="hidden" name="category_id"
                value="{{ $categories->where('id', $subcategories->where('id', $product->subcat_id)->first->get()->category_id)->first->get()->id }}">

            <input type="hidden" name="subcat_id"
                value="{{ $subcategories->where('id', $product->subcat_id)->first->get()->id }}">

            <div class="mb-2">
                <label for="">Product Image</label>
                <br>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="width: 300px">

                <input type="file" name="image" class="form-control mb-3 mt-3">
                @if ($errors->has('product_image'))
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-outline-success mb-3">Submit</button>
        </form>
    </div>
@endsection
