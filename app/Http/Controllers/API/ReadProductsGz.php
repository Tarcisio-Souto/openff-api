<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadProductsGz extends Controller
{
    
    public function ReadProductsFiles()
    {

        $arr_result_products = [];

        $arr_json_products = 
        [
            'products_json_01' => 'https://challenges.coode.sh/food/data/json/products_01.json.gz',
            'products_json_02' => "https://challenges.coode.sh/food/data/json/products_02.json.gz",
            'products_json_03' => "https://challenges.coode.sh/food/data/json/products_03.json.gz",
            'products_json_04' => "https://challenges.coode.sh/food/data/json/products_04.json.gz",
            'products_json_05' => "https://challenges.coode.sh/food/data/json/products_05.json.gz",
            'products_json_06' => "https://challenges.coode.sh/food/data/json/products_06.json.gz",
            'products_json_07' => "https://challenges.coode.sh/food/data/json/products_07.json.gz",
            'products_json_08' => "https://challenges.coode.sh/food/data/json/products_08.json.gz",
            'products_json_09' => "https://challenges.coode.sh/food/data/json/products_09.json.gz"
        ];


        foreach ($arr_json_products as $list => $urlJson)
        {
            $zd = @gzopen($urlJson, "r");
            $contents = @gzread($zd, 999999);
            @gzclose($zd);

            $result = json_encode($contents);
            $decode_result = json_decode($result, false);            

            $products = explode('}', $decode_result);

            for ($i = 0; $i < 100; $i++)
            {
                array_push($arr_result_products, json_decode($products[$i] . '}'));
            }

        }                    
        
        return $arr_result_products;

    }


    public function GetFields()
    {

        $arr_products_all_fields = $this->ReadProductsFiles();
        $arr_products = [];

        for ($i = 0; $i < sizeof($arr_products_all_fields); $i++)
        {

            if ($arr_products_all_fields[$i]->code[0] == '"')
            {
                $code = explode('"', $arr_products_all_fields[$i]->code);
                $codeAux = $code[1];
            } else
            {
                $codeAux = $arr_products_all_fields[$i]->code;
            }

            array_push($arr_products, 
                ['code' => $codeAux
                ,'status' => ''
                ,'imported_t' => ''
                ,'url' => $arr_products_all_fields[$i]->url
                ,'creator' => $arr_products_all_fields[$i]->creator
                ,'created_t' => $arr_products_all_fields[$i]->created_t
                ,'last_modified_t' => $arr_products_all_fields[$i]->last_modified_t
                ,'product_name' => $arr_products_all_fields[$i]->product_name
                ,'quantity' => $arr_products_all_fields[$i]->quantity
                ,'brands' => $arr_products_all_fields[$i]->brands
                ,'categories' => $arr_products_all_fields[$i]->categories
                ,'labels' => $arr_products_all_fields[$i]->labels
                ,'cities' => $arr_products_all_fields[$i]->cities
                ,'purchase_places' => $arr_products_all_fields[$i]->purchase_places
                ,'stores' => $arr_products_all_fields[$i]->stores
                ,'ingredients_text' => $arr_products_all_fields[$i]->ingredients_text
                ,'traces' => $arr_products_all_fields[$i]->traces
                ,'serving_size' => $arr_products_all_fields[$i]->serving_size
                ,'serving_quantity' => $arr_products_all_fields[$i]->serving_quantity
                ,'nutriscore_score' => $arr_products_all_fields[$i]->nutriscore_score
                ,'nutriscore_grade' => $arr_products_all_fields[$i]->nutriscore_grade
                ,'main_category' => $arr_products_all_fields[$i]->main_category
                ,'image_url' => $arr_products_all_fields[$i]->image_url     
            ]);
        }

        //dd($arr_products);

        return $arr_products;

    }




}
