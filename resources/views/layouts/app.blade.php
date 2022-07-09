<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <title>NewsLaravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ez.css') }}">
    <!-- Styles -->

</head>

<body class="antialiased">
    <x-navigation class="sticky"></x-navigation>

    <main class="flex my-24 justify-center w-full items-start font-sans space-x-4 tracking-[-.02em]">
        {{ $slot }}
    </main>

    @include('components.footer')
</body>

</html>
