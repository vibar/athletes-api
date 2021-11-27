<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $categories = Category::paginate();

        return CategoryResource::collection($categories);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return CategoryResource
     */
    public function show(Request $request, int $id)
    {
        $category = Category::findOrFail($id);

        return new CategoryResource($category);
    }

    /**
     * @param Request $request
     * @return CategoryResource
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return new CategoryResource($category);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return CategoryResource
     */
    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->all());

        return new CategoryResource($category);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return CategoryResource
     */
    public function destroy(Request $request, int $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return new CategoryResource($category);
    }
}
