<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function store(Request $request)
    {
        // return $request->only('title', 'image');
        $products = Product::create($request->only('title', 'image'));

        return response($products, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        // return $request->only('title', 'image');
        $product = Product::findOrFail($id);

        $product->update($request->only('title', 'image'));

        return response($product, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
