<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('description')->get();

        return response()->json(['data' => $categories]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $newCategory = Category::create($request->validated());

        return response()->json(['data' => $newCategory], 201);
    }

    public function update(UpdateCategoryRequest $request, int $id)
    {
        Category::findOrFail($id)->update($request->validated());

        return response()->noContent();
    }

    public function destroy(int $id)
    {
        Category::destroy($id);

        return response()->noContent();
    }
}
