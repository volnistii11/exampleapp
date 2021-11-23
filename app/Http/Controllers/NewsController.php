<?php

namespace App\Http\Controllers;


use App\Exceptions\News\AddingNewsIsNotAvailableNowException;
use App\Exceptions\News\ShowingAllNewsWithCategoryIsNotAvailableNowException;
use App\Exceptions\News\ShowingFormToAddNewsIsNotAvailableNowException;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\NewsShowRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\News\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsService $newsService;

    public function __construct(NewsService $newsService){
        $this->newsService = $newsService;
    }

    public function index()
    {
        try {
            $news = $this->newsService->showAllNewsWithCategory();
        } catch (ShowingAllNewsWithCategoryIsNotAvailableNowException $e) {
            return view('news.index')->with('warning', 'Can\'t show all news');
        }
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        try {
            $categories_and_sources = $this->newsService->createFormToAddNews();
        } catch (ShowingFormToAddNewsIsNotAvailableNowException $e) {
            return view('news.create')->with('warning', 'Can\'t show form to add news now :(');
        }
        return view('news.create', $categories_and_sources);
    }

    public function store(StoreNewsRequest $request)
    {
        $validated_news = $request->validated();
        try {
            $response = $this->newsService->createNews($validated_news);
        } catch (AddingNewsIsNotAvailableNowException $e) {
            return redirect()->route('news.create')->with('warning', 'Can\'t add news now :(');
        }

        return redirect()->route('news.index')->with($response);
    }

}
