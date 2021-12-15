<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /** @OA\Info(title="Personal Blog", version="0.1") */

    /**
     * @OA\Get(

     *  path="/v1/user/account/validate",

     *  operationId="accountValidate",

     *  summary="validates an account",

     *  @OA\Parameter(name="email",

     *    in="query",

     *    required=true,

     *    @OA\Schema(type="string")

     *  ),

     *  @OA\Response(response="200",

     *    description="Validation Response",

     *  )

     * )

     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}