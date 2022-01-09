@if (Session::has('success'))
    <div class="animate__animated animate__bounceIn w-full absolute top-0 right-0 md:mr-2 md:mt-2 md:ml-2 md:mb-2 shadow-lg flex items-center gap-x-2 z-50 bg-white dark:bg-green-400 p-3 rounded border-b-4 border-green-500 dark:border-green-700"
        style="max-width:20rem" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500 dark:text-green-700" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
        </svg>
        <div>
            <h1 class="font-bold">Success</h1>
            <p>
                {{ Session::get('success') }}
            </p>
        </div>
    </div>
@endif
@if (Session::has('error'))
    <div class="animate__animated animate__bounceIn w-full absolute top-0 right-0 md:mr-2 md:mt-2 md:ml-2 md:mb-2 shadow-lg flex items-center gap-x-2 z-50 bg-white dark:bg-red-400 p-3 rounded border-b-4 border-red-500 dark:border-red-700"
        style="max-width:20rem" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500 dark:text-red-700" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                clip-rule="evenodd" />
        </svg>
        <div>
            <h1 class="font-bold">Error</h1>
            <p>
                {{ Session::get('error')}}
            </p>
        </div>
    </div>
@endif
@if ( Session::has('errors'))
    <div class="animate__animated animate__bounceIn w-full absolute top-0 right-0 md:mr-2 md:mt-2 md:ml-2 md:mb-2 shadow-lg flex items-center gap-x-2 z-50 bg-white dark:bg-red-400 p-3 rounded border-b-4 border-red-500 dark:border-red-700"
        style="max-width:20rem" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500 dark:text-red-700" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                clip-rule="evenodd" />
        </svg>
        <div>
            <h1 class="font-bold">Error</h1>
            <ul>
                @foreach (Session::get('errors')->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if (Session::has('info'))
    <div class="animate__animated animate__bounceIn w-full absolute top-0 right-0 md:mr-2 md:mt-2 md:ml-2 md:mb-2 shadow-lg flex items-center gap-x-2 z-50 bg-white dark:bg-blue-400 p-3 rounded border-b-4 border-blue-500 dark:border-blue-700"
        style="max-width:20rem" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500 dark:text-blue-700" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd" />
        </svg>
        <div>
            <h1 class="font-bold">Info</h1>
            <p>
                {{ Session::get('info') }}
            </p>
        </div>
    </div>
@endif
@if (Session::has('warning'))
    <div class="animate__animated animate__bounceIn w-full absolute top-0 right-0 md:mr-2 md:mt-2 md:ml-2 md:mb-2 shadow-lg flex items-center gap-x-2 z-50 bg-white dark:bg-yellow-400 p-3 rounded border-b-4 border-yellow-500 dark:border-yellow-700"
        style="max-width:20rem" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500 dark:text-yellow-700" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        <div>
            <h1 class="font-bold">Warning</h1>
            <p>
                {{ Session::get('warning') }}
            </p>
        </div>
    </div>
@endif
