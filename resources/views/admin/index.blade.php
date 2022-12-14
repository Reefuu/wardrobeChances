@extends('layouts.app')

@section('container')
    <!-- Control buttons -->
    <div id="myBtnContainer" class="text-center  mt-3">
        <button class="btn btnk active" onclick="filterSelection('all')">All</button>
        <button class="btn btnk" onclick="filterSelection('categories')">Categories</button>
        <button class="btn btnk" onclick="filterSelection('subcat')">Subcategories</button>
        <button class="btn btnk" onclick="filterSelection('products')">Products</button>
    </div>
    <div class="container d-flex mx-auto align-items-center justify-content-center mt-4">
        <a href="{{ route('categories.create') }}" class="btn btn-outline-primary categories filterDiv">Create Category</a>
        <a href="{{ route('subcategories.create') }}" class="btn btn-outline-primary ms-4 subcat filterDiv">Create
            Subcategory</a>
    </div>



    <style>
        .filterDiv {
            display: none;
        }

        .btn.btnk {
            border: none;
            outline: none;
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .btn.btnk.active {
            background-color: #666;
            color: white;
        }

        .btn.btn-search {
            border: none;
            outline: none;
        }
    </style>
@endsection
