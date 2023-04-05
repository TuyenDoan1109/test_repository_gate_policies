<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\CreateCategoryRequest;
use App\Http\Requests\Api\Category\UpdateCategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return response()->ok(CategoryResource::collection($categories));
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request->all());
        if($category) {
            return response()->createdWithMessage(new CategoryResource($category), 'Created Successfully');
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

    public function show($id)
    {
        $category = $this->categoryRepository->getById($id);
        if($category) {
            return response()->ok(new CategoryResource($category));
        } else {
            return response()->notFound('This post does not exist!');
        }
    }

    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->update($id, $request->all());
        if($category) {
            return response()->okWithMessage(new CategoryResource($category), 'Updated Successfully');
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->delete($id);
        if($category) {
            return response()->noContent();
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

}
