@extends('layouts.app')

@section('header')

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

@endsection

@section('section')

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">
            @foreach ($users as $user)
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full border-solid border-blue-500 border"
                                src="https://i.pravatar.cc/150?u={{ $user->id }}" alt="Workflow">
                        </div>

                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <a href="/{{ $user->id }}" class="no-underline text-gray-900 dark:text-white">
                                {{ $user->name }}
                            </a>
                        </div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <table class="table-auto w-full mt-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">Name</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">Email</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">Spent</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">Country</div>
                </th>
            </tr>
        </thead>
        <tbody class="text-sm divide-y divide-gray-100">
            @foreach ($users as $user)

                <tr>
                    <td class="p-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full"
                                    src="https://i.pravatar.cc/150?u={{ $user->id }}" width="40" height="40"
                                    alt="{{ $user->name }}"></div>
                            <div class="font-medium text-gray-800">{{ $user->name }}</div>
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left">{{ $user->email }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left font-medium text-green-500">${{ rand(1000, 10000) . '.' . rand(10, 99) }}
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-lg text-center">🇺🇸</div>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table> --}}

@endsection


@section('links')
    <div class="mt-8">
        {{ $users->links() }}
    </div>
@endsection
