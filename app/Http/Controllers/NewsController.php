<?php

namespace App\Http\Controllers;


use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\NewsShowRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->get();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('news.create', compact('categories', 'sources'));
    }

    public function store(StoreNewsRequest $request)
    {
        News::create($request->validated());


        return redirect()->route('news.index')->with('success', 'Новость успешно добавлена');
    }

}
