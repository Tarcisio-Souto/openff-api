<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    private $product;

    public function __construct(Products $product)
    {
        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        


    }

    public function getAllProducts()
    {

        $products = $this->product::paginate(50);
        return response()->json($products, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($code)
    {
        $product = $this->product->where('code', ' ' . $code)->first();
        
        if (!$product) {
            return response()->json(['error' => 'Nenhum produto encontrado!', 404]);
        }

        return response()->json($product, 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code)
    {
        //$url = "https://world.openfoodfacts.org/api/v2/product/737628064502.json";

        $product = $this->product->where('code', ' ' . $code)->firstOrFail();
        $product->update($request->all());

        return response()->json($product, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code)
    {
        $product = $this->product->where('code', ' ' . $code)->first();
        
        if (!$product) {
            return response()->json(['error' => 'Nenhum produto encontrado!', 404]);
        }

        $product->status = 'trash';
        $product->update();

        return response()->json(['success' => 'Registro alterado com status "trash".', $product]);
        


    }
}
