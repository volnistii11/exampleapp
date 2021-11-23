<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>

    <x-content-body>
        <div class="my-8">
            <x-auth-validation-errors :errors="$errors"/>
        </div>
        @if(session()->has('warning'))
            <div class="mb-6 bg-red-200 text-green-700 px-3 px-2 rounded-lg">
                {{ session()->get('warning') }}
            </div>
        @endif

        @if(isset($warning))
            <div class="mb-6 bg-red-200 text-green-700 px-3 px-2 rounded-lg">
                {{ $warning }}
            </div>
        @else
            <div class="max-w-md">
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf

                    <div class="mt-4">
                        <x-label for="user_name" :value="__('User name')"/>

                        <x-input id="user_name" class="block mt-1 w-full" type="text" name="user_name"
                                 :value="old('user_name')"
                                 required
                                 autofocus/>
                    </div>

                    <div class="mt-4">
                        <x-label for="review" :value="__('Review')"/>

                        <x-input id="review" class="block mt-1 w-full" type="text" name="review"
                                 :value="old('review')" required
                                 autofocus/>
                    </div>

                    <div class="mt-4">
                        <x-button>
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </form>
            </div>
        @endif
    </x-content-body>
</x-app-layout>

