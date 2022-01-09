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
                Create New
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

    <div class="mt-3 p-3 rounded bg-white dark:bg-gray-500 border-t-4 border-green-500 w-full md:w-96">
        <h1 class="dark:text-gray-200 text-xl font-bold mb-3">Create New User</h1>
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div>
                <label for="name" class="dark:text-gray-200">Name</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" autofocus
                    class="w-full bg-white rounded border border-gray-300 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            </div>
            <div class="mt-2">
                <label for="email" class="dark:text-gray-200">Email</label>
                <input type="text" id="email" name="email" value="{{old('email')}}"
                    class="w-full bg-white rounded border border-gray-300 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            </div>

            <div class="mt-2">
                <label for="password" class="dark:text-gray-200">Password</label>
                <input type="password" id="password" name="password" value="" autofocus
                    class="w-full bg-white rounded border border-gray-300 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            </div>

            <div class="mt-2">
                <label for="password_confirmation" class="dark:text-gray-200">Confirm Password</label>
                <input type="text" id="password_confirmation" name="password_confirmation" value="" autofocus
                    class="w-full bg-white rounded border border-gray-300 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            </div>

            <div class="mt-2">
                <label for="password_confirmation" class="dark:text-gray-200">Role</label>
                <select class="rounded border appearance-none border-gray-300 py-2 text-base pl-3 pr-10 w-full" name="role">
                    <option value="">Select</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end border-t-2 dark:border-gray-700 pt-2 mt-2">
                <button type="submit"
                    class="flex items-center gap-x-1 px-4 pt-2.5 pb-2 bg-green-600 text-white font-medium text-sm leading-normal  rounded shadow hover:bg-green-700 hover:shadow-lg transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
