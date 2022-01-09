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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-normal text-blue-700 dark:text-blue-400">{{ $role->id }}</span>
            </h1>
        </div>
        <a href="{{ route('roles.index') }}"
            class="flex items-center text-sm md:text-2xl text-gray-800 font-bold dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <span>Back</span>
        </a>
    </div>
    <div
        class="mt-3 p-3 shadow flex items-center justify-center gap-x-2 md:w-fit bg-white dark:bg-gray-500 dark:text-gray-50 rounded">
        <span class="font-bold">Role</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
        <span class="font-normal">{{ $role->name }}</span>
    </div>
    <div class="mt-3 p-3 rounded bg-white dark:bg-gray-500 border-t-4 border-green-500">
        <div class="flex gap-x-2 text-xl items-center justify-center md:justify-start pb-2 border-b-2 dark:border-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span class="font-bold dark:text-gray-50">Permissions</span>
        </div>
        @if ($permissions->count() == 0)
            <div class="rounded py-5 px-6 mb-3 text-base text-gray-500 dark:text-gray-200 inline-flex items-center justify-center w-full mt-3"
                role="alert">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle"
                    class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z">
                    </path>
                </svg>
                No Permission Found.
            </div>
        @else
            @can('edit_permissions')
                <form action="{{ route('roles.permissions.update') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $role->name }}" name="role">
                @endcan
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-3">
                    <?php $disabled = 'disabled'; ?>
                    @can('edit_permissions')
                        <?php $disabled = ''; ?>
                    @endcan
                    @foreach ($permissions as $permission)
                        <div class="form-check cursor-pointer">
                            <input
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                {{ $disabled }} name="permissions[]" value="{{ $permission->name }}">
                            <label class="form-check-label inline-block text-gray-800 dark:text-gray-200"
                                for="flexCheckDefault">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @can('edit_permissions')
                    <div class="flex justify-end border-t-2 dark:border-gray-700 pt-2">
                        <button type="submit"
                            class="flex items-center gap-x-1 px-4 pt-2.5 pb-2 bg-green-600 text-white font-medium text-sm leading-normal  rounded shadow hover:bg-green-700 hover:shadow-lg transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Save
                        </button>
                    </div>
                </form>
            @endcan
        @endif


    </div>
@endsection
