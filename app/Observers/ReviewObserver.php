<?php

namespace App\Observers;

use App\Events\Reviews\ReviewCreated;
use App\Events\Reviews\ReviewCreating;
use App\Events\Reviews\ReviewRetrieved;
use App\Listeners\Reviews\CreateCreatedReviewLogs;
use App\Models\Review;

class ReviewObserver
{
    public function retrieved(Review $review)
    {
        ReviewRetrieved::dispatch($review);
    }

    public function created(Review $review)
    {
        ReviewCreated::dispatch($review);
    }

    public function creating(Review $review)
    {
        ReviewCreating::dispatch($review);
    }
}
