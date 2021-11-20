<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <x-content-body>
        @if(isset($warning))
            <div class="mb-6 bg-green-200 text-green-700 px-3 px-2 rounded-lg">
                {{ $warning }}
            </div>
        @else
        <ul>
            @foreach($categories as $category)
                <li><a href="{{ route('categories.show', compact('category')) }}">{{ $category->name }} |
                        Count: {{ $category->news_count }} | avg rating: {{ number_format($category->news_avg_rating,1) }}</a></li>
            @endforeach
        </ul>
        @endif
    </x-content-body>
</x-app-layout>
