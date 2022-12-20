@extends('layouts.app')

@section('container')
    <div class="container">
        <h1 class="mb-5">{{ $pagetitle }}</h1>
        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="mb-3">
                <label for="" class="mb-3">Testimonial Desc</label>
                <input type="text" name="testimonial_desc" class="form-control mb-3"
                    value="{{ $testimonial->testimonial_desc }}">
                @if ($errors->has('testimonial_desc'))
                    <p class="text-danger">{{ $errors->first('testimonial_desc') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="" class="mb-3">Username</label>
                <input type="text" name="user_id" class="form-control" value="{{ $testimonial->user->username }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="" class="mb-3">Product Name</label>
                <input type="text" name="product_id" class="form-control" value="{{ $product->name }}"
                    readonly>
            </div>
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
@endsection
