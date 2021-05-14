<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('vendor/ckeditor/ckeditor/ckeditor.js') }}"></script>
        <script type="text/javascript">
            window.onload = function() {
                CKEDITOR.replace( 'extra_info' );
            };
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-blue-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-blue-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-5xl uppercase text-gray-50 leading-tight">
                        {{ $header }}
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main class="bg-blue-900">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
