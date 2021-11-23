<?php

namespace App\Listeners\Categories;

use App\Events\Categories\CategoryRetrieved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateRetrievedCategoryLogs
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CategoryRetrieved $categoryRetrieved)
    {
        \Log::info('Retrieved category(is)' . $categoryRetrieved->category->name);
    }
}
