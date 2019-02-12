<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * Display product page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return view('products.create');

    }

    /**
     * store product
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();

        return view('products.create');

    }

    /**
     * Display products
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products()
    {

        $products = Product::all()->paginate(10);

        return view('products.create', compact('products'));
    }



}
