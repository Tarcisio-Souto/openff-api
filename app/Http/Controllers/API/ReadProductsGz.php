<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadProductsGz extends Controller
{
    
    public static function ReadProductsFiles()
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
            $zd = gzopen($urlJson, "r");
            $contents = gzread($zd, 999999);
            gzclose($zd);

            $result = json_encode($contents);
            $decode_result = json_decode($result);
            
            $products = explode('}', $decode_result);

            for ($i = 0; $i < 100; $i++)
            {
                array_push($arr_result_products, $products[$i]);
            }

        }                    
        
        dd(sizeof($arr_result_products));


    }



}
