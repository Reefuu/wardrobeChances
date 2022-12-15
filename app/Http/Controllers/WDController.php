<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WDController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('search')) {
            return view('index', [
                "pagetitle" => "Wardrobe Chance",
                "maintitle" => "Wardrobe Chance",
                "products" => Product::where('name', 'like', '%' . $request->search . '%')->get(),
                "searches" => $request->search,
                "categories" => Category::all(),
                "subcat" => Subcategory::all()

            ]);
        } else {
            return view('index', [
                "pagetitle" => "Wardrobe Chance",
                "maintitle" => "Wardrobe Chance",
                "products" => Product::all(),
                "categories" => Category::all(),
                "subcat" => Subcategory::all()

            ]);
        }
    }

    public function detailproduct(Product $product){
        return view('detailproduct', [
            "pagetitle" => "Product Details",
            "maintitle" => "Product Details",
            "product" => $product,
        ]);
    }

    public function product(Request $request)
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

            ]);
        }
    }

    public function wishlist()
    {
        return view('wishlist', [
            "pagetitle" => "Whistlist",
            "wishlist" => Wishlist::all()
        ]);
    }

    public function cart()
    {
        return view('cart', [
            "pagetitle" => "Cart",
            "cart" => Cart::all()
        ]);
    }
}
