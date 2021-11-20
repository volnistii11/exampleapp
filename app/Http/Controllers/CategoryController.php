<?php

namespace App\Http\Controllers;

use App\Exceptions\Categories\ShowingAllNewsOfOneCategoryIsNotAvailableNowException;
use App\Exceptions\Categories\ShowingCategoriesIsNotAvailableNowException;
use App\Models\Category;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function show(Category $category)
    {
        try {
            $news = $this->categoryService->showAllNewsOfOneCategory($category);
        } catch (ShowingAllNewsOfOneCategoryIsNotAvailableNowException $e) {
            return view('categories.show')->with('warning', 'Can\'t show all news of \'' . $category->name . '\' category :(!');
        }
        return view('categories.show', compact('category', 'news'));
    }

    public function index()
    {
        try {
            $categories = $this->categoryService->showAllNewsWithAvgRatingAndCount();
        } catch (ShowingCategoriesIsNotAvailableNowException $e) {
            return view('categories.index')->with('warning', 'Can\'t show all categories');
        }
        return view('categories.index', compact('categories'));
    }
}
