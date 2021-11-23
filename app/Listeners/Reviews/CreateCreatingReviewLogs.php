<?php

namespace App\Listeners\Reviews;

use App\Events\Reviews\ReviewCreating;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateCreatingReviewLogs
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
    public function handle(ReviewCreating $reviewCreating)
    {
        Log::info('Review creating ' . $reviewCreating->review->review);
    }
}
