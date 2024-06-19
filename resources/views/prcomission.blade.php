<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Styles CSS */
        .bg-white-900 {
            background-color: #FFFFFF;
        }

        .dark:bg-white-900 {
            background-color: #FFFFFF;
        }

        .border-white-900 {
            border-color: #FFFFFF;
        }

        .dark:border-white-900 {
            border-color: #FFFFFF;
        }

        .text-gray-900 {
            color: #1F2937;
        }

        .dark:text-gray-900 {
            color: #1F2937;
        }

        .hover\:bg-gray-100:hover {
            background-color: #F3F4F6;
        }

        .group:hover .text-gray-900 {
            color: #1F2937;
        }

        .w-6 {
            width: 1.5rem;
        }

        .h-6 {
            height: 1.5rem;
        }

        .ms-3 {
            margin-left: 0.75rem;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }
    </style>
</head>
<body class="font-sans antialiased flex justify-center">

<nav class="bg-white-900 dark:bg-white-900 fixed w-full z-20 top-0 start-0 h-20 border-b border-white-900 dark:border-white-900 flex justify-between">
    <a class="flex items-center space-x-3 rtl:space-x-reverse ">
        {{-- <div style="display: flex; justify-content: center; align-items: center; height: 100px;"> --}}
        <img src="{{ asset('images/nouveau-logo-uadb.png') }}" alt="Logo UADB" width="300" height="auto">
        {{-- </div> --}}
    </a>

    <ul class="flex items-center h-20 justify-right space-x-3">
        <li>
            <a href="{{ route('profile.edit') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group ">
                <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
                {{-- <span class="flex-1 ms-3 whitespace-nowrap">{{ Auth::user()->nom}}</span> --}}
            </a>
        </li>
    </ul>
    {{-- </div> --}}
</nav>

</body>
</html>
