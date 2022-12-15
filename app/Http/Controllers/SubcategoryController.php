<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
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
        return view('addsubcatform', [
            'pagetitle' => "Create Subcategory",
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubcategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubcategoryRequest $request)
    {
        $this->validate($request, [
            'subcat_name' => 'required|string|max:50',
        ]);

        Subcategory::create([
            'subcat_name' => $request->subcat_name,
            'category_id' => $request->category_id,
        ]);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("updatesubcatform", [
            'subcategory' => Subcategory::findOrFail($id),
            'pagetitle' => "Update Subcategory",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubcategoryRequest  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcategoryRequest $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $subcategory->update([
            "subcat_name" => $request->subcat_name,
        ]);

        return redirect("/admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::withTrashed()->findOrFail($id);

        if ($subcategory->trashed()) {
            $subcategory->restore();
        } else {
            $subcategory->delete();
        }

        return redirect("/admin");
    }
}
