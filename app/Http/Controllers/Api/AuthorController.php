<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate();
        return response()->json(['data' => $authors], Response::HTTP_OK);
    }

    /**
     * Open form for create new category
     */
    public function create()
    {
        $author = new Author();
        return response()->json(['data' => $author->toArray(), 'success' => true], Response::HTTP_OK);
    }
    /**
     * Store new resource
     */
    public function store(CreateAuthorRequest $request)
    {
        $author = Author::create($request->input());
        return response()->json(['data' => $author, 'success' => true], Response::HTTP_OK);
    }

    /**
     * Edit category form
     */
    public function edit(Author $author)
    {
        return response()->json(['data' => $author, 'success' => true], Response::HTTP_OK);
    }

    /**
     * Destroy resource
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(['success' => true, 'data' => $author], Response::HTTP_OK);
    }

    /**
     * Update category
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->input());
        return response()->json(['success' => true, 'data' => $author], Response::HTTP_OK);
    }
}
