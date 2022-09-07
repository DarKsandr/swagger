<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\API\ApiBookStoreRequest;
use App\Models\Book;

class ApiBookController extends ApiController
{
    /**
     * @OA\Get(
     *   tags={"Books"},
     *   path="/books",
     *   summary="Get books",
     *   @OA\Parameter(
     *     name="page",
     *     in="query",
     *     required=false,
     *     example=1,
     *     @OA\Schema(type="integer"),
     *   ),
     *   @OA\Response(response=200, description="OK"),
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Book::paginate(15));
    }

    /**
     * @OA\Post(
     *   tags={"Books"},
     *   path="/books",
     *   summary="Store a newly created resource in storage.",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name","author","pages"},
     *       @OA\Property(property="name", type="string", example="War and Peace"),
     *       @OA\Property(property="author", type="string", example="L. N. Tolstoy"),
     *       @OA\Property(property="pages", type="int", example="1300"),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="OK"),
     * )
     * 
     * @param \App\Http\Requests\ApiBookStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ApiBookStoreRequest $request)
    {
        $book = Book::create($request->validated());
        return response($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
