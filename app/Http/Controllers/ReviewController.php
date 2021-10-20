<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewShowRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(ReviewShowRequest $request)
    {
        Review::create($request->validated());
        return redirect()->route('reviews.index')->with('success', 'Review added successfully!');
    }

}
