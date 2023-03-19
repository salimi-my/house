<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Font Awesome Solid -->
        <link href="/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet" />
        <link href="/assets/fontawesome/css/regular.min.css" rel="stylesheet" />
        <link href="/assets/fontawesome/css/brands.min.css" rel="stylesheet" />
        <link href="/assets/fontawesome/css/solid.min.css" rel="stylesheet" />

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
        <link rel="manifest" href="/site.webmanifest" />

        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="antialiased dark:bg-gray-900" style="margin-bottom: 0 !important;">
        @inertia
    </body>
</html>
