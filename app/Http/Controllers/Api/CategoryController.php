<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * View categories list
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perpage');
        $categories = Category::paginate($perPage);
        return response()->json(['data' => $categories, 'success' => true], Response::HTTP_OK);
    }

    /**
     * Open form for create new category
     */
    public function create()
    {
        $category = new Category();
        return response()->json(['data' => $category->toArray(), 'success' => true], Response::HTTP_OK);
    }
    /**
     * Store new resource
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->input());
        return response()->json(['data' => $category, 'success' => true], Response::HTTP_OK);
    }

    /**
     * Edit category form
     */
    public function edit(Category $category)
    {
        return response()->json(['data' => $category, 'success' => true], Response::HTTP_OK);
    }

    /**
     * Destroy resource
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['success' => true, 'data' => $category], Response::HTTP_OK);
    }

    /**
     * Update category
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->input());
        return response()->json(['success' => true, 'data' => $category], Response::HTTP_OK);
    }
}
