<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wishlist', [
            "pagetitle" => "Whistlist",
            "wishlists" => Wishlist::all()->where('user_id', Auth::id()),
            "products" => Product::all(),
            "carts" => Cart::withTrashed()->where('user_id', Auth::id())->get(),
            "categories" => Category::all(),
            "subcat" => Subcategory::all(),

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
     * @param  \App\Http\Requests\StoreWishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishlistRequest $request)
    {
        Wishlist::create([
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
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishlistRequest  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::withTrashed()->findOrFail($id);

        if ($wishlist->trashed()) {
            $wishlist->restore();
        } else {
            $wishlist->delete();
        }

        if (str_contains(url()->previous(), 'product')) {
            return redirect("/product/" . $wishlist->product_id);
        } else if (str_contains(url()->previous(), 'wishlist')) {
            return redirect("/wishlist");
        } else if (str_contains(url()->previous(), 'cart')) {
            return redirect("/cart");
        }
    }
}
