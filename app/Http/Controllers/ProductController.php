<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return new ProductCollection(Product::all());
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return $product;
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json(
            [
                "mensaje: " => "producto elimando"
            ]
        );
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(
            [
                "mensaje: " => "producto elimando"
            ]
        );
    }
}
