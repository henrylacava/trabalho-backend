<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(): CategoryCollection
    {
        $categories = Category::select('description')->get();
        return new CategoryCollection($categories);
    }

    public function store(CategoryStoreRequest $request)
    {
        $newCategory = Category::create($request->validated());
        return new CategoryResource($newCategory);
    }

    public function update(CategoryUpdateRequest $request, int $id)
    {
        $updatedCategory = tap(Category::findOrFail($id))->update($request->validated());
        return new CategoryResource($updatedCategory);
    }

    public function destroy(int $id)
    {
        Category::destroy($id);
        return response()->noContent();
    }
}
