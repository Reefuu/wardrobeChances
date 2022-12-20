<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WDController extends Controller
{
    public function index(Request $request)
    {
        return view('index', [
            "pagetitle" => "Wardrobe Chance",
            "maintitle" => "Wardrobe Chance",
            "products" => Product::all()->sortBy('id', SORT_REGULAR, true),
            "categories" => Category::all(),
            "subcat" => Subcategory::all(),
            "testimonials" => Testimonial::all(),
            "users" => User::all()
        ]);
    }
}
