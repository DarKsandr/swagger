<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;
use App\Models\User;

class ApiExampleController extends ApiController
{
    /**
     * @OA\Get(
     *   tags={"Example"},
     *   path="/users",
     *   summary="Get users",
     *   @OA\Parameter(
     *     name="page",
     *     in="query",
     *     required=false,
     *     description="Page number",
     *     example=1,
     *   ),
     *   @OA\Response(response=200, description="OK"),
     * )
     */
    public function users()
    {
        return response(User::paginate(15));
    }
}
