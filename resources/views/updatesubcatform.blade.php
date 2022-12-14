@extends('layouts.app')

@section('container')
    <div class="container">
        <h1 class="mb-5">{{ $pagetitle }}</h1>
        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="mb-3">
                <label for="" class="mb-3">Subcategory Name</label>
                <input type="text" name="subcat_name" class="form-control mb-3" value="{{ $subcategory->subcat_name }}">
                @if ($errors->has('subcat_name'))
                    <p class="text-danger">{{ $errors->first('subcat_name') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="" class="mb-3">Category Name</label>
                <input type="text" name="category_name" class="form-control" value="{{ $subcategory->category->category_name }}" readonly>
            </div>
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
@endsection