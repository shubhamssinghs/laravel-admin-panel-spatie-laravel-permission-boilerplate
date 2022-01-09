@extends('layouts.app')
@section('content')
    <div class="flex justify-between items-center border-b-2 border-gray-300 dark:border-gray-700">
        <div class="text-gray-800 font-bold dark:text-gray-300 flex items-center text-sm md:text-3xl py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2 -mt-1" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
            </svg>
            <h1 class="flex items-center gap-x-1">
                Users
            </h1>
        </div>
        @can('create_users')
            <a href="{{ route('users.create') }}"
                class="flex items-center gap-x-1 px-2 py-1 md:px-4 md:py-2  bg-blue-600 text-white font-medium text-sm leading-normal  rounded shadow hover:bg-blue-700 hover:shadow-lg transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Create New
            </a>
        @endcan
    </div>
    <div class="pt-3 overflow-x-auto">
        @include('users.table')
    </div>
@endsection
