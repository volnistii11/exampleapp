<?php

namespace App\Http\Controllers;

use App\Exceptions\Reviews\AddingReviewIsNotAvailableNowException;
use App\Exceptions\Reviews\ShowingAllReviewsIsNotAvailableNowException;
use App\Exceptions\Reviews\ShowingFormToAddReviewIsNotAvailableNowException;
use App\Http\Requests\ReviewShowRequest;
use App\Models\Review;
use App\Services\Review\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        try {
            $reviews = $this->reviewService->showAllReviews();
        } catch (ShowingAllReviewsIsNotAvailableNowException $e) {
            return view('reviews.index')->with('warning', 'Can\'t show all reviews now! :(');
        }
        return view('reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function create()
    {
        try {
            $this->reviewService->showFormToAddReview();
        } catch (ShowingFormToAddReviewIsNotAvailableNowException $e) {
            return view('reviews.create')->with('warning', 'Can\'t show form to add review now! :(');
        }
        return view('reviews.create');
    }

    public function store(ReviewShowRequest $request)
    {
        $validated_review = $request->validated();
        try {
            $response = $this->reviewService->createReview($validated_review);
        } catch (AddingReviewIsNotAvailableNowException $e) {
            return redirect()->route('reviews.create')->with('warning', 'Can\'t create review now! :(');
        }
        return redirect()->route('reviews.index')->with($response);
    }

}
