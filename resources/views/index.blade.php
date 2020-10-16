<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- <link rel="shortcut icon" href="{{ asset('/vendor/horizon/img/favicon.png') }}"> --}}

        <title>Inbox{{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>

        <link href='{{ asset(mix('app.css', 'vendor/laravel-inbox')) }}' rel='stylesheet' type='text/css'>
    </head>
    <body class="antialiased bg-gray-100">
        <div id="app" v-cloak></div>

        <script src="{{ asset(mix('app.js', 'vendor/laravel-inbox')) }}"></script>
    </body>
</html>