<?php

namespace App\Providers;

use App\Events\Categories\CategoryRetrieved;
use App\Events\News\NewsCreated;
use App\Events\News\NewsCreating;
use App\Events\News\NewsRetrieved;
use App\Events\Orders\OrderCreated;
use App\Events\Reviews\ReviewCreated;
use App\Events\Reviews\ReviewCreating;
use App\Events\Reviews\ReviewRetrieved;
use App\Listeners\Categories\CreateRetrievedCategoryLogs;
use App\Listeners\News\CreateCreatedNewsLogs;
use App\Listeners\News\CreateCreatingNewsLogs;
use App\Listeners\News\CreateRetrievedNewsLogs;
use App\Listeners\Orders\CreateOrderRecipe;
use App\Listeners\Orders\SendEmailToCustomer;
use App\Listeners\Reviews\CreateCreatedReviewLogs;
use App\Listeners\Reviews\CreateCreatingReviewLogs;
use App\Listeners\Reviews\CreateRetrievedReviewLogs;
use App\Models\Category;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreated::class => [
            CreateOrderRecipe::class,
            SendEmailToCustomer::class
        ],
        CategoryRetrieved::class => [
            CreateRetrievedCategoryLogs::class,
        ],
        NewsRetrieved::class => [
            CreateRetrievedNewsLogs::class,
        ],
        NewsCreated::class => [
            CreateCreatedNewsLogs::class,
        ],
        NewsCreating::class => [
            CreateCreatingNewsLogs::class,
        ],
        ReviewRetrieved::class => [
            CreateRetrievedReviewLogs::class,
        ],
        ReviewCreated::class => [
            CreateCreatedReviewLogs::class,
        ],
        ReviewCreating::class => [
            CreateCreatingReviewLogs::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
