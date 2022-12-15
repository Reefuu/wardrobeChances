@extends('layouts.app')

@section('container')
    <!-- Control buttons -->
    <div id="myBtnContainer" class="text-center  mt-3">
        <button class="btn btnk" onclick="filterSelection('all')">All</button>
        <button class="btn btnk" onclick="filterSelection('categories')">Categories</button>
        <button class="btn btnk" onclick="filterSelection('subcat')">Subcategories</button>
        <button class="btn btnk" onclick="filterSelection('products')">Products</button>
    </div>
    <div class="d-flex mx-auto align-items-center justify-content-center mt-4">
        <a href="{{ route('categories.create') }}" class="categories filterDiv btn btn-outline-dark">
            Create Category
        </a>
        <a href="{{ route('subcategories.create') }}" class="subcat filterDiv btn btn-outline-dark ms-3">
            Create Subcategory
        </a>
    </div>
    <div class="container mt-4">
        <div class="categories filterDiv">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $category['category_name'] }}</td>
                            <td>
                                @if ($category->trashed())
                                    Deleted
                                @else
                                    Available
                                @endif
                            </td>
                            <td>
                                <div class="mt-2">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-primary">Update</a>
                                </div>
                                <div class="mt-2">
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')

                                        @if ($category->trashed())
                                            <button type="submit" class="btn btn-success">
                                                Restore </button>
                                        @else
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        @endif


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
                        <th>Category Status</th>
                        <th>Status</th>
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
                                        @if ($category->trashed())
                                            Deleted
                                        @else
                                            Available
                                        @endif
                                    </td>
                                    <td>
                                        @if ($subcat->trashed())
                                            Deleted
                                        @else
                                            Available
                                        @endif
                                    </td>
                                    <td>
                                        <div class="mt-2">
                                            <a href="{{ route('subcategories.edit', $subcat->id) }}"
                                                class="btn btn-primary">Update</a>
                                        </div>
                                        <div class="mt-2">
                                            <form action="{{ route('subcategories.destroy', $subcat->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @if ($subcat->trashed())
                                                    <button type="submit" class="btn btn-success">
                                                        Restore </button>
                                                @else
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                @endif
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
@endsection
