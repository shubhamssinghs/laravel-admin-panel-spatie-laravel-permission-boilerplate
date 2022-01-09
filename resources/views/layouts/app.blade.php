<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css" id="sweetalert_theme">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="font-sans antialiased bg-gray-200 dark:bg-gray-600 overflow-x-hidden">
    @include('layouts.tostr')
    <div>
        @include('layouts.navbar')
        <div class="flex overflow-hidden pt-12">
            @include('layouts.sidebar')
            <div id="main-content" class="h-full w-full bg-gray-200 dark:bg-gray-600 relative overflow-y-auto lg:ml-64">
                <main>
                    <div class="px-4 pt-6 w-full">
                        @yield('content')
                    </div>
                    <p class="text-center text-sm text-gray-500 dark:text-gray-300 my-10">
                        © 2019-2021
                        <a href="#" class="hover:underline" target="_blank">CodeMerge Software & IT Solutions</a>. All
                        rights reserved.
                    </p>
                </main>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/theme-switcher.js') }}"></script>
@yield('script')
<script>
    function confirmDelete(form) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        return false;
    }
</script>

</html>
