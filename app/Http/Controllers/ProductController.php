<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            return view('product', [
                "pagetitle" => "Products",
                "maintitle" => "Our Products",
                "products" => Product::where('name', 'like', '%' . $request->search . '%')->get(),
                "categories" => Category::all(),
                "subcat" => Subcategory::all()
            ]);
        } else {
            return view('product', [
                "pagetitle" => "Products",
                "maintitle" => "Our Products",
                "products" => Product::all(),
                "categories" => Category::all(),
                "subcat" => Subcategory::all()

            ]);}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addproductform', [
            'pagetitle' => "Create Product",
            'categories' => Category::all(),
            'subcategories' => Subcategory::all(),
            'products' => Product::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'price' => 'required|number',
        ]);

        Product::create([
            'name' => $request->name,
            'size' => $request->size,
            'color' => $request->color,
            'bust' => $request->bust,
            'length' => $request->length,
            'waist' => $request->waist,
            'price' => $request->price,
            'status' => $request->status,
            'subcat_id' => $request->subcat_id,
            'category_id' => $request->category_id,
            'image' => $request->image,
        ]);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("updateproductform", [
            'product' => Product::findOrFail($id),
            'pagetitle' => "Update Product",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            "name" => $request->name,
        ]);

        return redirect("/admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        if ($product->trashed()) {
            $product->restore();
        } else {
            $product->delete();
        }

        return redirect("/admin");
    }
}
