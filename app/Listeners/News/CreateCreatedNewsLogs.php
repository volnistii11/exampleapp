<?php

namespace App\Listeners\News;

use App\Events\News\NewsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCreatedNewsLogs
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
    public function handle(NewsCreated $newsCreated)
    {
        \Log::info("News created. ID: {$newsCreated->news->id}");
    }
}
