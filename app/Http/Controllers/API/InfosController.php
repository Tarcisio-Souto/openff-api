<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Infos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfosController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api",
     *      operationId="getInfos",
     *      tags={"Infos API"},
     *      summary="Get infos",
     *      description="Return infos API",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function getInfos(Infos $infos)
    {
        $infos = DB::table('infos')
        ->latest()
        ->first();

        return response()->json(['success' => $infos]);


    }



}
