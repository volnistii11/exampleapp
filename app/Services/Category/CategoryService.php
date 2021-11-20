<?php


namespace App\Services\Category;


use App\Exceptions\Categories\ShowingAllNewsOfOneCategoryIsNotAvailableNowException;
use App\Exceptions\Categories\ShowingCategoriesIsNotAvailableNowException;
use App\Models\Category;

class CategoryService
{
    public function showAllNewsWithAvgRatingAndCount()
    {
        if (!config('categories.able_to_show_all_categories_with_avg_rating_and_count')) {
            throw new ShowingCategoriesIsNotAvailableNowException();
        }

        return Category::withCount('news')
            ->withAvg('news', 'rating')
            ->get();
    }

    public function showAllNewsOfOneCategory(Category $category)
    {
        if (!config('categories.able_to_show_all_news_of_one_category')){
            throw new ShowingAllNewsOfOneCategoryIsNotAvailableNowException();
        }
        return $category->news()->get();
    }

}
