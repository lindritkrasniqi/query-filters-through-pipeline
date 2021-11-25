@extends('layouts.app')

@section('section')

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full border-solid border-blue-500 border"
                            src="https://i.pravatar.cc/150?u={{ $user->id }}" alt="Workflow">
                    </div>

                    <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                        {{ $user->name }}
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <span class="font-bold">{{ __('Email') }}:</span> {{ $user->email }}
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <span class="font-bold">{{ __('Verified') }}:</span>
                        {{ $user->email_verified_at->diffForHumans() }}
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <span class="font-bold">{{ __('Created at') }}:</span>
                        {{ $user->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
