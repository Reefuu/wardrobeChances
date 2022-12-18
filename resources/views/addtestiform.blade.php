@extends('layouts.app')

@section('container')
    <div class="container">
        <h1 class="mb-5">{{ $pagetitle }}</h1>
        <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="mb-3">Testimonial Desc</label>
                <input type="text" name="testimonial_desc" class="form-control mb-3">
                @if ($errors->has('testimonial_desc'))
                    <p class="text-danger">{{ $errors->first('testimonial_desc') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="" class="mb-3">Username</label>
                <select name="category_id" class="form-control mb-3">
                    @foreach ($users as $user)
                        <option value="{{ $user['id'] }}">{{ $user['username'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="mb-3">Product Name</label>
                <select name="product_id" class="form-control mb-3">
                    @foreach ($products as $product)
                        <option value="{{ $product['id'] }}">{{ $user['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
@endsection
