<?php

namespace Database\Seeders;

use App\Http\Controllers\API\ReadProductsGz;
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
         * @var object $all_products
         */

        $all_products = ReadProductsGz::class;
        $all_products->GetFields();

        


    }
}
