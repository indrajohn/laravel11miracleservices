<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(['resources/css/app.css'])
       <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
        ></link>
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css"
        />
        <link
        href="https://fonts.cdnfonts.com/css/montserrat"
        rel="stylesheet"
        ></link>
        <!-- Scripts -->
        @routes
        {{-- @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"]) --}}
        @vite(['resources/js/app.js'])
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
</html>
