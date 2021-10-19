<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>

    <x-content-body>
        <div class="flex flex-wrap justify-between -mx-e">
            @forelse($reviews as $review)
                <div class="w-full md:w-1/3 lg:w-1/4 px-3">
                    <x-reviews.review-preview :review="$review"/>
                </div>
            @empty
                <p>There's no reviews for today</p>
            @endforelse
        </div>
    </x-content-body>
</x-app-layout>
