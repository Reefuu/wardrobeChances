<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionProductRequest;
use App\Http\Requests\UpdateTransactionProductRequest;
use App\Models\TransactionProduct;

class TransactionProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Http\Requests\StoreTransactionProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionProduct  $transactionProduct
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionProduct $transactionProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionProduct  $transactionProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionProduct $transactionProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionProductRequest  $request
     * @param  \App\Models\TransactionProduct  $transactionProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionProductRequest $request, TransactionProduct $transactionProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionProduct  $transactionProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionProduct $transactionProduct)
    {
        //
    }
}
