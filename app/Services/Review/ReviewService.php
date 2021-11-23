<?php


namespace App\Services\Review;

use App\Exceptions\Reviews\AddingReviewIsNotAvailableNowException;
use App\Exceptions\Reviews\ShowingAllReviewsIsNotAvailableNowException;
use App\Exceptions\Reviews\ShowingFormToAddReviewIsNotAvailableNowException;
use App\Models\Review;

class ReviewService
{
    public function showAllReviews(){
        if (!config('reviews.able_to_show_all_reviews'))
        {
            throw new ShowingAllReviewsIsNotAvailableNowException();
        }
        return $reviews = Review::all();
    }

    public function showFormToAddReview(): bool
    {
        if (!config('reviews.able_to_show_form_to_add_review'))
        {
            throw new ShowingFormToAddReviewIsNotAvailableNowException();
        }
        return true;
    }

    public function createReview($validated_review): array
    {
        if (!config('reviews.able_to_add_review')){
            throw new AddingReviewIsNotAvailableNowException();
        }
        Review::create($validated_review);
        return [
            'success' => 'Review added successfully!',
        ];
    }
}
