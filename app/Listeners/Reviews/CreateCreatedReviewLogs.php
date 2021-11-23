<?php

namespace App\Listeners\Reviews;

use App\Events\Reviews\ReviewCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateCreatedReviewLogs
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
    public function handle(ReviewCreated $reviewCreated)
    {
        Log::info('Review created ' . $reviewCreated->review->review);
    }
}
