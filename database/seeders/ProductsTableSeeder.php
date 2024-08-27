<?php

namespace Database\Seeders;

use App\Enums\TypeOfStatusEnum;
use App\Http\Controllers\API\ReadProductsGz;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * 
         * 
         * @var string $all_products
         */

        $all_products = app(ReadProductsGz::class)->GetFields();

        for ($i = 0; $i < sizeof($all_products); $i++)
        {
            $product = new Products();

            $product->code = ' ' . $all_products[$i]['code'];
            $product->status = 'draft';
            $product->imported_t = date('Y-m-d H:i:s');
            $product->url = $all_products[$i]['url'];
            $product->creator = $all_products[$i]['creator'];
            $product->created_t = $all_products[$i]['created_t'];
            $product->last_modified_t = $all_products[$i]['last_modified_t'];
            $product->product_name = $all_products[$i]['product_name'];
            $product->quantity = $all_products[$i]['quantity'];
            $product->brands = $all_products[$i]['brands'];
            $product->categories = $all_products[$i]['categories'];
            $product->labels = $all_products[$i]['labels'];
            $product->cities = $all_products[$i]['cities'];
            $product->purchase_places = $all_products[$i]['purchase_places'];
            $product->stores = $all_products[$i]['stores'];
            $product->ingredients_text = $all_products[$i]['ingredients_text'];
            $product->traces = $all_products[$i]['traces'];
            $product->serving_size = $all_products[$i]['serving_size'];
            $product->serving_quantity = $all_products[$i]['serving_quantity'];
            $product->nutriscore_score = $all_products[$i]['nutriscore_score'];
            $product->nutriscore_grade = $all_products[$i]['nutriscore_grade'];
            $product->main_category = $all_products[$i]['main_category'];
            $product->image_url = $all_products[$i]['image_url'];

            $product->save();

        }


    }
}
