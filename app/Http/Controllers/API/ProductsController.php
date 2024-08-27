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





    /**
     * @OA\Get(
     *      path="/api/products",
     *      operationId="getAllProducts",
     *      tags={"Products"},
     *      summary="Get list of products",
     *      description="Returns list of products",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function getAllProducts()
    {

        $products = $this->product::paginate(50);
        return response()->json($products, 200);

    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *      path="/api/products/{code}",
     *      tags={"Products"},
     *      operationId="show",
     *      summary="Show product",
     *      @OA\Parameter(
     *          name="code",
     *          in="path",
     *          required=true
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success"
     *      ),
     * ),
     */
    public function show($code)
    {
        $product = $this->product->where('code', ' ' . $code)->first();
        $productAux = $this->product->where('code', $code)->first();
        $val = false;
        
        if (!$product) 
        {
            $val = false;
        } else
        {
            return response()->json($product, 200);
        }

        if (!$productAux) 
        {
            $val = false;
        } else 
        {
            return response()->json($productAux, 200);
        }

        if (!$product && !$productAux)
        {
            return response()->json(['error' => 'Nenhum produto encontrado!', 404]);
        }

        

    }


    /**
     * Update the specified resource in storage.
     */

    /**
     * @OA\Put(
     *      path="/api/products/{code}",
     *      operationId="updateProducts",
     *      tags={"Products"},
     *      summary="Update product",
     *      description="Update product data",
     *      @OA\Parameter(name="code", description="code", required=true, in="path", @OA\Schema(type="string")),
     *      @OA\RequestBody(
     *         @OA\JsonContent(
     *            @OA\Schema(
     *               type="object",
     *               required={"code", "status", "imported_t", "url", "creator", 
     *                         "created_t", "last_modified_t", "product_name",
     *                         "quantity", "brands", "categories", "labels", "cities",
     *                         "purchase_places", "stores", "ingredients_text", "traces",
     *                         "serving_size", "serving_quantity", "nutriscore_score", 
     *                         "nutriscore_grade", "main_category", "image_url"     
     *               },
     *               @OA\Property(property="code", type="string"),
     *               @OA\Property(property="status", type="string"),
     *               @OA\Property(property="imported_t", type="dateTime"),
     *               @OA\Property(property="url", type="string"),
     *               @OA\Property(property="creator", type="string"),
     *               @OA\Property(property="created_t", type="string"),
     *               @OA\Property(property="last_modified_t", type="string"),
     *               @OA\Property(property="product_name", type="string"),
     *               @OA\Property(property="quantity", type="string"),
     *               @OA\Property(property="brands", type="string"),
     *               @OA\Property(property="categories", type="string"),
     *               @OA\Property(property="labels", type="string"),
     *               @OA\Property(property="cities", type="string"),
     *               @OA\Property(property="purchase_places", type="string"),
     *               @OA\Property(property="stores", type="string"),
     *               @OA\Property(property="ingredients_text", type="string"),
     *               @OA\Property(property="traces", type="string"),
     *               @OA\Property(property="serving_size", type="string"),
     *               @OA\Property(property="serving_quantity", type="string"),
     *               @OA\Property(property="nutriscore_score", type="string"),
     *               @OA\Property(property="nutriscore_grade", type="string"),
     *               @OA\Property(property="main_category", type="string"),
     *               @OA\Property(property="image_url", type="string"),
     *            ),
     *         ),
     *         @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *               type="object",
     *               required={"code", "status", "imported_t", "url", "creator", 
     *                         "created_t", "last_modified_t", "product_name",
     *                         "quantity", "brands", "categories", "labels", "cities",
     *                         "purchase_places", "stores", "ingredients_text", "traces",
     *                         "serving_size", "serving_quantity", "nutriscore_score", 
     *                         "nutriscore_grade", "main_category", "image_url"
     *               },
     *               @OA\Property(property="code", type="string"),
     *               @OA\Property(property="status", type="string"),
     *               @OA\Property(property="imported_t", type="dateTime"),
     *               @OA\Property(property="url", type="string"),
     *               @OA\Property(property="creator", type="string"),
     *               @OA\Property(property="created_t", type="string"),
     *               @OA\Property(property="last_modified_t", type="string"),
     *               @OA\Property(property="product_name", type="string"),
     *               @OA\Property(property="quantity", type="string"),
     *               @OA\Property(property="brands", type="string"),
     *               @OA\Property(property="categories", type="string"),
     *               @OA\Property(property="labels", type="string"),
     *               @OA\Property(property="cities", type="string"),
     *               @OA\Property(property="purchase_places", type="string"),
     *               @OA\Property(property="stores", type="string"),
     *               @OA\Property(property="ingredients_text", type="string"),
     *               @OA\Property(property="traces", type="string"),
     *               @OA\Property(property="serving_size", type="string"),
     *               @OA\Property(property="serving_quantity", type="string"),
     *               @OA\Property(property="nutriscore_score", type="string"),
     *               @OA\Property(property="nutriscore_grade", type="string"),
     *               @OA\Property(property="main_category", type="string"),
     *               @OA\Property(property="image_url", type="string"),
     *            ),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal error"
     *      ),
     * )
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

    /**
     * @OA\Delete(
     *      path="/api/products/{code}",
     *      tags={"Products"},
     *      operationId="deleteProduct",
     *      summary="Delete product",
     *      @OA\Parameter(
     *          name="code",
     *          in="path",
     *          required=true
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success"
     *      ),
     * ),
     */
    public function destroy($code)
    {
        $product = $this->product->where('code', ' ' . $code)->first();
        $productAux = $this->product->where('code', $code)->first();
        $val = false;
        
        if (!$product) 
        {
            $val = false;

        } else 
        {
            $product->status = 'trash';
            $product->update();

            return response()->json(['success' => 'Registro alterado com status "trash".', $product]);
        }

        if (!$productAux) 
        {
            $val = false;

        } else
        {
            $productAux->status = 'trash';
            $productAux->update();

            return response()->json(['success' => 'Registro alterado com status "trash".', $productAux]);
        }

        if (!$product && !$productAux)
        {
            return response()->json(['error' => 'Nenhum produto encontrado!', 404]);
        }

        
        


    }
}
