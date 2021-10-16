<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::with('Product')->paginate(10);
        return view('subCategories.index', compact('subCategories'));
    }

    /**bcategories
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('subCategory')->get();
        return view('subCategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addSub = new SubCategory();

        $request->validate([
            'name' => 'required',
            'CategoryID'=>'required'
        ]);

        $addSub->name = $request->name;
        $addSub->slug = $request->slug;
        $addSub->CategoryID = $request->CategoryID;

        $addSub->save();

        return redirect(route('subCategories.index'))->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::with('subCategory')->get();
        return view('subCategories.edit', ['subCategory' => $subCategory,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'name' => 'required',
            'CategoryID'=>'required'
        ]);

        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->CategoryID = $request->CategoryID;

        $subCategory->save();

        return redirect(route('subCategories.index'))->with([
            'message' => $subCategory->name . ' is updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        return redirect(route('subCategories.index'))->with('success', 'Sub Category Deleted!');
    }
}
