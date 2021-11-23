<?php


namespace App\Services\News;


use App\Exceptions\News\AddingNewsIsNotAvailableNowException;
use App\Exceptions\News\ShowingAllNewsWithCategoryIsNotAvailableNowException;
use App\Exceptions\News\ShowingFormToAddNewsIsNotAvailableNowException;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;

class NewsService
{
    public function showAllNewsWithCategory()
    {
        if (!config('news.able_to_show_all_news_with_category')) {
            throw new ShowingAllNewsWithCategoryIsNotAvailableNowException();
        }
        return News::with('category')->get();
    }

    public function createFormToAddNews(): array
    {
        if (!config('news.able_to_show_form_to_add_news')) {
            throw new ShowingFormToAddNewsIsNotAvailableNowException();
        }
        $categories = Category::all();
        $sources = Source::all();
        return compact('categories', 'sources');
    }

    public function createNews($validated_news)
    {
        if (!config('news.able_to_add_news')) {
            throw new AddingNewsIsNotAvailableNowException();
        }

        News::create($validated_news);
        return ['success' => 'News successfully added'];
    }

}
