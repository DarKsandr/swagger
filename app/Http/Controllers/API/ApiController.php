<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Example for response examples value"
 * ),
 * @OA\Server(
 *      url="http://localhost/api",
 *      description="Development server"
 * ),
 * @OA\Tag(
 *  name="Example",
 *  description="Example API",
 * ),
 * @OA\Tag(
 *   name="ApiBook",
 *   description="Books API",
 * )
 * 
 */
class ApiController extends Controller
{
}
