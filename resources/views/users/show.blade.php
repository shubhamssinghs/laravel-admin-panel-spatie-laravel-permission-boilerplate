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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-normal text-blue-700 dark:text-blue-400">{{ $user->id }}</span>
            </h1>
        </div>
        <a href="{{ route('users.index') }}"
            class="flex items-center text-sm md:text-2xl text-gray-800 font-bold dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <span>Back</span>
        </a>
    </div>

    <div class="flex flex-col items-start md:flex-row gap-y-4 md:gap-y-0 md:gap-x-4  mt-4">
        <div class="bg-white dark:bg-gray-500 w-full md:w-1/3 rounded pb-5 relative z-10">
            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                class="absolute right-2 top-2 z-50 bg-blue-600 rounded p-2 text-white" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <div class="flex items-center justify-center pt-10 pb-5 flex-col">
                @if ($user->avatar && $user->avatar != ' ')
                    <img src="{{ asset('avatar') . '/' . $user->avatar }}" alt="avatar" class="rounded-full w-24">
                @else
                    {!! Avatar::create($user->name)->toSvg() !!}
                @endif
                <h1 class="text-gray-800 font-semibold text-xl mt-5 dark:text-gray-200">{{ $user->name }}</h1>
                <h1 class="text-gray-500 text-sm dark:text-gray-300">{{ $user->email }}</h1>
            </div>
            <div class="flex justify-between items-center px-4 py-1">
                <h1 class="font-bold dark:text-gray-200">Role</h1>
                <span class="px-3 py-1 text-xs font-bold bg-green-500 rounded-full">
                    {{ $user->roles->pluck('name')[0] }}
                </span>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-500 w-full rounded p-3 ">
            <div
                class="flex gap-x-2 text-xl items-center justify-center md:justify-start pb-2 border-b-2 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-bold dark:text-gray-50">User Permissions</span>
            </div>
            @if ($user->roles->pluck('name')[0] == 'super-admin')
                <div class="w-full flex justify-center items-center py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    All Permissions
                </div>
            @elseif ($user->getAllPermissions()->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-3">
                    @foreach ($user->getAllPermissions() as $permission)
                        <div class="form-check">
                            <input
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2"
                                type="checkbox" checked disabled>
                            <label class="form-check-label inline-block text-gray-800 dark:text-gray-200"
                                for="flexCheckDefault">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded py-5 px-6 mb-3 text-base text-gray-500 dark:text-gray-200 inline-flex items-center justify-center w-full mt-3"
                    role="alert">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle"
                        class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z">
                        </path>
                    </svg>
                    No Permission Found.
                </div>
            @endif
        </div>
    </div>
@endsection
