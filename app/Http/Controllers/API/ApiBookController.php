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
     *   tags={"ApiBook"},
     *   path="/books",
     *   summary="ApiBook show all",
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
     *   tags={"ApiBook"},
     *   path="/books",
     *   summary="ApiBook create",
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
     */
    public function store(ApiBookStoreRequest $request)
    {
        $book = Book::create($request->validated());
        return response($book);
    }

    /**
     * @OA\Get(
     *   tags={"ApiBook"},
     *   path="/books/{id}",
     *   summary="ApiBook show",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     example=1,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function show(Book $book)
    {
        return response($book);
    }

    /**
     * @OA\Put(
     *   tags={"ApiBook"},
     *   path="/books/{id}",
     *   summary="ApiBook update",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *       required=true,
     *       description="Updated book object",
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   ),
     *   @OA\Response(response=404, description="Not Found"),
     *   @OA\Response(response=422, description="Unprocessable Entity")
     * )
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return response($book);
    }

    /**
     * @OA\Delete(
     *   tags={"ApiBook"},
     *   path="/books/{id}",
     *   summary="ApiBook destroy",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response($book);
    }
}
