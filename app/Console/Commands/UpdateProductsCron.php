<?php

namespace App\Console\Commands;

use App\Models\Products;
use Illuminate\Console\Command;
use App\Http\Controllers\API\ReadProductsGz;
use Illuminate\Support\Facades\DB;

class UpdateProductsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateProducts:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para executar a atualização dos produtos de acordo com o Open Food Facts';


    


    public function updateData()
    {
        /**
         * 
         * 
         * @var string $all_products
         */

        $all_products = app(ReadProductsGz::class)->GetFields();
        $products = Products::all();

        for ($i = 0; $i < 900; $i++)
        {     
            DB::table('foodfacts')
            ->where('id', $products[$i]->id)
            ->update(array(
                 'id' => $products[$i]->id
                ,'code' => ' ' . $all_products[$i]['code']
                ,'status' => 'draft'
                ,'imported_t' => date('Y-m-d H:i:s')
                ,'url' => $all_products[$i]['url']
                ,'creator' => $all_products[$i]['creator']
                ,'created_t' => $all_products[$i]['created_t']
                ,'last_modified_t' => $all_products[$i]['last_modified_t']
                ,'product_name' => $all_products[$i]['product_name']
                ,'quantity' => $all_products[$i]['quantity']
                ,'brands' => $all_products[$i]['brands']
                ,'categories' => $all_products[$i]['categories']
                ,'labels' => $all_products[$i]['labels']
                ,'cities' => $all_products[$i]['cities']
                ,'purchase_places' => $all_products[$i]['purchase_places']
                ,'stores' => $all_products[$i]['stores']
                ,'ingredients_text' => $all_products[$i]['ingredients_text']
                ,'traces' => $all_products[$i]['traces']
                ,'serving_size' => $all_products[$i]['serving_size']
                ,'serving_quantity' => $all_products[$i]['serving_quantity']
                ,'nutriscore_score' => $all_products[$i]['nutriscore_score']
                ,'nutriscore_grade' => $all_products[$i]['nutriscore_grade']
                ,'main_category' => $all_products[$i]['main_category']
                ,'image_url' => $all_products[$i]['image_url']
            ));

        }
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Rotina automática iniciada em ' . now());
        $this->updateData();
        $this->info('Rotina executada com sucesso em ' . now());
    }
}
