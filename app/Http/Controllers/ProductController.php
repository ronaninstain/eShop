<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Category::with('Product')->get();
        $subProducts = SubCategory::with('Product')->get();
        return view('products.create', compact('products', 'subProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addProduct = new Product();

        $request->validate([
            'name' => 'required',
            'productType' => 'required',
            'CategoryID' => 'required'
        ]);

        $addProduct->name = $request->name;
        $addProduct->productType = $request->productType;
        $addProduct->CategoryID = $request->CategoryID;

        $addProduct->save();

        return redirect(route('products.index'))->with('success', 'Product Added!');
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
    public function edit(Product $product)
    {
        $products = Category::with('Product')->get();
        $subProducts = SubCategory::with('Product')->get();
        return view('products.edit', ['product' => $product, 'products' => $products, 'subProducts' => $subProducts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'CategoryID' => 'required',
            'SubCategoryID' => 'required'
        ]);

        $product->name = $request->name;
        $product->productType = $request->productType;
        $product->CategoryID = $request->CategoryID;
        $product->SubCategoryID = $request->SubCategoryID;

        $product->save();

        return redirect(route('products.index'))->with([
            'message' => $product->name . ' is updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'))->with('success', 'product deleted!');
    }
}
