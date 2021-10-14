@props(['review'])

<div class="bg-white shadow-sm rounded-lg p-6 mt-6">
    <p class="px-2 py-1 text-xs rounded-nt bg-gray-200 text-gray-700 uppercase font-semibold">{{ $review->user_name }}</p>
    <p class="mt-4"><a href="{{ route('reviews.show', ['review' => $review]) }}">{{ $review->review }}</a></p>
    <p class="mt-4 text-xs text-gray-500">{{ $review->created_at->format('d.m.Y.') }}</p>
</div>
