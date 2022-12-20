<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addtestiform', [
            'pagetitle' => "Create Testimonial",
            'products' => Product::all()->where('status', "sold"),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {

        $this->validate($request, [
            'testimonial_desc' => 'required|string',
        ]);

        $product = Product::withTrashed()->findOrFail($request->product_id);

        Testimonial::create([
            'testimonial_desc' => $request->testimonial_desc,
            'user_id' => $request->user_id,
        ]);

        $testimoni = Testimonial::all()->where('user_id', $request->user_id)->where('testimonial_desc', $request->testimonial_desc)->first();

        $product->update([
            'name' => $product->name,
            'size' => $product->size,
            'color' => $product->color,
            'bust' => $product->bust,
            'length' => $product->length,
            'waist' => $product->waist,
            'price' => $product->price,
            'status' => $product->status,
            'subcat_id' => $product->subcat_id,
            'category_id' => $product->category_id,
            'testimonial_id' => $testimoni->id,
        ]);

        return redirect("/admin");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("updatetestiform", [
            'testimonial' => Testimonial::findOrFail($id),
            'product' => Product::withTrashed()->where('testimonial_id', $id)->first(),
            'pagetitle' => "Update Testimonial",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimonialRequest  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->update([
            "testimonial_desc" => $request->testimonial_desc,
        ]);

        return redirect("/admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::withTrashed()->where('id', $id)->first();

        if ($testimonial->trashed()) {
            $testimonial->restore();
        } else {
            $testimonial->delete();
        }

        return redirect("/admin");
    }
}
