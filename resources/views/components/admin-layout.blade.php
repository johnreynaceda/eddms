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
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <x-notifications z-index="z-50" />
    <div class="flex h-screen overflow-hidden bg-gray-100 relative">
        <img src="{{ asset('images/crane1.png') }}" class="fixed -bottom-10 right-0 opacity-20" alt="">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-green-700 relative border-r">
                    <img src="{{ asset('images/sksu_bg.jpg') }}" class="absolute h-full top-0 object-cover opacity-20"
                        alt="">
                    <div class="flex flex-col flex-shrink-0 relative  px-4">
                        <a class="text-lg font-semibold flex justify-center tracking-tighter text-black focus:outline-none focus:ring "
                            href="/">
                            <img src="{{ asset('images/ccs_logo.png') }}" class="h-20" alt="">
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow relative px-4 mt-10">
                        <x-sidebar />
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="header sticky top-0  z-10 bg-white border-b py-3 px-10 flex justify-between items-center">
                    <div class="flex space-x-2 items-end">

                        <h1 class="font-bold text-green-700 text-2xl">COLLEGE OF COMPUTER STUDIES</h1>
                    </div>
                    <div class="flex space-x-3 items-center">

                        <livewire:user-dropdown />

                    </div>
                </div>
                <div class="p-6 py-10">
                    <div class="max-w-7xl mx-auto  sm:px-6 md:px-8">
                        <header class="font-bold text-gray-700 uppercase text-xl">@yield('title')</header>
                        <div class="mt-6">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
