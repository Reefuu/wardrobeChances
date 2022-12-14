@extends('layouts.app')

@section('container')
    <div class="container">
        <h1>{{ $pagetitle }}</h1>
        <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="mb-3">Subcategory Name</label>
                <input type="text" name="subcat_name" class="form-control mb-3">
                <label for="" class="mb-3">Category Name</label>
                <select name="category_id" class="form-control mb-3">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-success">Submit</button>
            </div>
        </form>
    </div>
@endsection