@extends('layouts.app')

@section('container')
    <div class="container">
        <h1>{{ $pagetitle }}</h1>
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="mb-3">Category Name</label>
                <input type="text" name="category_name" class="form-control mb-3">
                <button type="submit" class="btn btn-outline-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
