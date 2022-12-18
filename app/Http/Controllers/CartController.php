<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart', [
            "pagetitle" => "Cart",
            "pagetitle" => "Whistlist",
            "wishlists" => Wishlist::withTrashed()->where('user_id', Auth::id())->get(),
            "products" => Product::all(),
            "carts" => Cart::all()->where('user_id', Auth::id()),
            "categories" => Category::all(),
            "subcat" => Subcategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        Cart::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
        ]);

        if (str_contains(url()->previous(), 'product')) {
            return redirect("/product/" . $request->product_id);
        } else if (str_contains(url()->previous(), 'wishlist')) {
            return redirect("/wishlist");
        } else if (str_contains(url()->previous(), 'cart')) {
            return redirect("/cart");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::withTrashed()->findOrFail($id);

        if ($cart->trashed()) {
            $cart->restore();
        } else {
            $cart->delete();
        }


        if (str_contains(url()->previous(), 'product')) {
            return redirect("/product/" . $cart->product_id);
        } else if (str_contains(url()->previous(), 'wishlist')) {
            return redirect("/wishlist");
        } else if (str_contains(url()->previous(), 'cart')) {
            return redirect("/cart");
        }
    }
}
