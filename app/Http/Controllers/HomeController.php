<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategories;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title          = 'Get Your Favorite Laptop Here | Gadget Store | Cheap Price Than Others';
        $request        = request();
        $search         = $request->input('search');
        $productsQuery  = Products::query();

        if ($search) {
            $productsQuery->where('name', 'like', '%' . $search . '%');
        }

        $products   = $productsQuery->with('category')->paginate(12)->withQueryString();

        return view('home', [
            'products'      => $products,
            'title'         => 'Get Your Favorite Laptop Here | Gadget Store | Cheap Price Than Others',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
