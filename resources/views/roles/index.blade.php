@extends('layouts.app')
@section('content')
    <div class="flex justify-between items-center border-b-2 border-gray-300 dark:border-gray-700">
        <div class="text-gray-800 font-bold dark:text-gray-300 flex items-center text-sm md:text-3xl py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2 -mt-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="flex items-center gap-x-1">
                Roles
            </h1>
        </div>
        @can('create_roles')
            <a href="{{ route('roles.create') }}"
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
        @include('roles.table')
    </div>
@endsection
