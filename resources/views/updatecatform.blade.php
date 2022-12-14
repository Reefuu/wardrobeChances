@extends('layouts.app')

@section('container')
    <div class="container">
        <h1 class="mb-5">{{ $pagetitle }}</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="mb-3">
                <label for="" class="mb-3">Category Name</label>
                <input type="text" name="category_name" class="form-control mb-3" value="{{ $category->category_name }}">
                @if ($errors->has('category_name'))
                    <p class="text-danger">{{ $errors->first('category_name') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
@endsection
