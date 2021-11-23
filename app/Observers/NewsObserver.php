<?php

namespace App\Observers;

use App\Events\News\NewsCreated;
use App\Events\News\NewsCreating;
use App\Events\News\NewsRetrieved;
use App\Models\News;

class NewsObserver
{
    public function creating(News $news)
    {
        NewsCreating::dispatch($news);
    }

    public function created(News $news)
    {
        NewsCreated::dispatch($news);
    }

    public function retrieved(News $news)
    {
        NewsRetrieved::dispatch($news);
    }
}
