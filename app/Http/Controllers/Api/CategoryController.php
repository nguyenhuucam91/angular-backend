<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller 
{
    public function index(Request $request)
    {
        $perPage = $request->query('perpage');
        $categories = Category::paginate($perPage);
        return response()->json(['data' => $categories]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['status' => 'ok']);
    }
}