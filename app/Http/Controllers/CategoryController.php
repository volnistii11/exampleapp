<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $news = $category->news()->get();
        return view('categories.show', compact('category', 'news'));
    }

    public function index()
    {
        $categories = Category::withCount('news')
            ->withAvg('news', 'rating')
            ->get();
        //dd($categories);
        return view('categories.index', compact('categories'));
    }


}
