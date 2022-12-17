@extends('layouts.app')

@section('container')
    
    <div class="container">

        <h1 class="mb-3 my-2">Add Product</h1>

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="" class="mb-1">Product Name (*Req)</label>
                <input type="text" name="name" class="form-control mb-3 ">
                @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Size</label>
                <input type="text" name="size" class="form-control mb-3">
                @if ($errors->has('size'))
                    <p class="text-danger">{{ $errors->first('size') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Color (*Req)</label>
                <input type="text" name="color" class="form-control mb-3">
                @if ($errors->has('color'))
                    <p class="text-danger">{{ $errors->first('color') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Bust</label>
                <input type="text" name="bust" class="form-control mb-3">
                @if ($errors->has('bust'))
                    <p class="text-danger">{{ $errors->first('bust') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Length</label>
                <input type="text" name="length" class="form-control mb-3">
                @if ($errors->has('length'))
                    <p class="text-danger">{{ $errors->first('length') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Waist</label>
                <input type="text" name="waist" class="form-control mb-3">
                @if ($errors->has('waist'))
                    <p class="text-danger">{{ $errors->first('waist') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Price (*Req)</label>
                <input type="text" name="price" class="form-control mb-3">
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
                <label for="" class="mb-1">Category Name</label>
                <select name="category_id" class="form-control mb-3">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Subcategory Name</label>
                <select name="subcat_id" class="form-control mb-3">
                    @foreach ($subcategories as $subcat)
                        <option value="{{ $subcat['id'] }}">{{ $subcat['subcat_name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="" class="mb-1">Product Image</label>
                <input type="file" name="image" class="form-control mb-3">
                @if ($errors->has('product_image'))
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-outline-success mb-3">Submit</button>
        </form>
    </div>
@endsection
