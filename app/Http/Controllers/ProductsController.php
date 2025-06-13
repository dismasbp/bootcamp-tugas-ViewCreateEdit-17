<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategories;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all products and categories from the database
        $products   = Products::with('category')->paginate(12);

        // Return the view with products and categories
        return view('product.index', [
            'products'      => $products,
            'title'         => 'Product List',
            'description'   => 'Browse our collection of products.',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategories::all();
        return view('product.create', [
            'categories' => $categories,
            'title' => 'Add New Product',
            'description' => 'Insert a new product into the catalog.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product    = Products::findOrFail($id);
        $categories = ProductCategories::all();
        return view('product.edit', [
            'product'       => $product,
            'categories'    => $categories,
            'title'         => 'Edit Product',
            'description'   => 'Modify the details of the selected product.',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
