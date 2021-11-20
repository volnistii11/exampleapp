<?php

namespace App\Providers;

use App\Http\Requests\NewsShowRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use App\Observers\CategoryObserver;
use App\Observers\NewsObserver;
use App\Observers\OrderObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        News::observe(NewsObserver::class);
        Order::observe(OrderObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
