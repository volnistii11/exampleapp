<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $review->id }}
        </h2>
    </x-slot>

    <x-content-body>
        <div class="my-8">
            <x-auth-validation-errors :errors="$errors"/>
        </div>
        <h1 class="text-lg">{{ $review->user_name }}</h1>
        <p class="text-xs text-gray-500 mt-10">{{ $review->created_at->format('d.m.Y.') }}</p>
        <p class="mt-4">{{ $review->review }}</p>
    </x-content-body>
</x-app-layout>
