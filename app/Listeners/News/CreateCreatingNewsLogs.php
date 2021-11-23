<?php

namespace App\Listeners\News;

use App\Events\News\NewsCreating;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCreatingNewsLogs
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
    public function handle(NewsCreating $newsCreating)
    {
        \Log::info("News creating. ID: {$newsCreating->news->title}");
    }
}
