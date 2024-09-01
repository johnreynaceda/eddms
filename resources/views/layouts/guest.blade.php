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

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased h-full bg-blue-500">
    <section>
        <div class="relative flex h-screen justify-center max-h-full overflow-hidden lg:px-0 md:px-12">
            <div class="hidden bg-green-700 lg:block lg:flex-1 lg:relative sm:contents">
                <img src="{{ asset('images/sksu_logo.png') }}" class="absolute -top-40 -right-40 h-[40rem] opacity-5"
                    alt="">
                <img src="{{ asset('images/sksu_bg.jpg') }}"
                    class="absolute bottom-0 opacity-20 left-0 right-0  h-full  " alt="">
                <div class=" grid relative place-content-center h-full">
                    <img src="{{ asset('images/sksu_logo.png') }}" class="h-40 " alt="">
                    <div
                        class="w-full pb-6 mt-5 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                        <div class="mb-3">
                            <h1
                                class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                                <span class="block xl:inline  font-black text-[10rem]">ISULAN</span>
                                <span class="block font-base  xl:inline" data-primary="indigo-600">CAMPUS</span>

                            </h1>

                        </div>
                        <a href="sksu.edu.ph" target="_blank"
                            class="bg-yellow-300 bg-opacity-80 text-gray-700 hover:text-blue-600 p-1 rounded-xl px-2 italic w-auto">
                            www.sksu.edu.ph</a>
                        <p class="mx-auto text-sm text-white sm:max-w-md font-base md:max-w-3xl">A trailblazer in
                            arts, science and technology int the region.</p>

                    </div>
                </div>
            </div>
            <div
                class="relative z-10 flex flex-col flex-1 px-4 py-10 bg-white lg:border-r lg:py-24 md:flex-none md:px-28 sm:justify-center">
                <div class="w-full max-w-md mx-auto md:max-w-sm md:px-0 md:w-96 sm:px-4">
                    <div class="flex flex-col">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/ccs_logo.png') }}" class="h-28" alt="">
                        </div>

                    </div>
                    <div class="mt-8">
                        <button
                            class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium duration-200 bg-gray-100 rounded-xl hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600"
                            type="button" aria-label="Sign in with Google">
                            <ion-icon name="logo-google" role="img" class="md hydrated"
                                aria-label="logo google"></ion-icon>

                            <span>Sign in with Google</span>
                        </button>

                        <div class="relative py-3">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center">
                                <span class="px-2 text-sm text-black bg-white">Or continue with</span>
                            </div>
                        </div>
                    </div>

                    {{ $slot }}
                </div>
            </div>

        </div>
    </section>

    @filamentScripts
    @vite('resources/js/app.js')


</body>

</html>
