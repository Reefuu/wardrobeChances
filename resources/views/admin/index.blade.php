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
    <div class="container mt-4">
        <div class="categories filterDiv">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $category['category_name'] }}</td>
                            <td>
                                <div class="mt-2">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-primary">Update</a>
                                </div>
                                <div class="mt-2">
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container mt-5">
        <div class="subcat filterDiv">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subcategory Name</th>
                        <th>Category Name</th>
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
                                        <div class="mt-2">
                                            <a href="{{ route('subcategories.edit', $subcat->id) }}"
                                                class="btn btn-primary">Update</a>
                                        </div>
                                        <div class="mt-2">
                                            <form action="{{ route('subcategories.destroy', $subcat->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
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
