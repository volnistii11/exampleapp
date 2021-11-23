<?php

namespace App\Listeners\Reviews;

use App\Events\Reviews\ReviewCreated;
use App\Events\Reviews\ReviewRetrieved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateRetrievedReviewLogs
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
    public function handle(ReviewRetrieved $reviewRetrieved)
    {
        Log::info('Review retrieved ' . $reviewRetrieved->review->review);
    }
}
