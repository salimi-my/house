<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome Solid -->
        <link href="/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
        <link href="/assets/fontawesome/css/regular.min.css" rel="stylesheet">
        <link href="/assets/fontawesome/css/brands.min.css" rel="stylesheet">
        <link href="/assets/fontawesome/css/solid.min.css" rel="stylesheet">

        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="antialiased dark:bg-gray-900">
        @inertia
    </body>
</html>
