<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Transaction;
use App\Models\TransactionProduct;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transactions', [
            "pagetitle" => "Transactions",
            "maintitle" => "Your Transactions",
            "products" => Product::all(),
            "categories" => Category::all(),
            "subcat" => Subcategory::all(),
            "users" => User::all(),
            "transactions" => Transaction::withTrashed()->get(),
            "transacProds" => TransactionProduct::all(),
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
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {



        Transaction::create([
            'total_price' => $request->total_price,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);

        $transId = Transaction::all()->sortBy('id', SORT_REGULAR, true)->first()->id;

        TransactionProduct::create([
            'transaction_id' => $transId,
            'product_id' => $request->product_id,
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product) {
            $product->status = 'sold';
            $product->save();
        }

        $wishlist = Wishlist::all()->where('product_id', $request->product_id);

        foreach ($wishlist as $wlist) {
            $wlist->delete();
        }

        $cart = Cart::all()->where('product_id', $request->product_id);

        foreach ($cart as $crt) {
            $crt->delete();
        }

        return redirect("/transactions");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->status = $request->status;
        $transaction->save();

        return redirect("/transactions");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::withTrashed()->findOrFail($id);

        $transaction->status = 'canceled';

        $transaction->save();

        $TransProd = TransactionProduct::all()->where('transaction_id', $transaction->id)->first();

        $prod = Product::findOrFail($TransProd->product_id);

        $prod->status = 'available';

        $prod->save();

        $transaction->delete();


        return redirect("/transactions");
    }
}
