<?php

namespace App\Listeners\News;

use App\Events\News\NewsRetrieved;
use App\Models\News;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateRetrievedNewsLogs
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
    public function handle(NewsRetrieved $newsRetrieved)
    {
        Log::info("Retrieved news" . $newsRetrieved->news->title);
    }
}
