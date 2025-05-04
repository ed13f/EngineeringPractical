<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome to Laravel Starter</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col">
        <!-- Navigation component-->
        <x-navigation />
        <main class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8 flex-grow">
            <!-- All child elements wrapped inside the layout component will display here -->
            {{$slot}}
        </main>
        <!-- Footer component-->
        <x-footer />
    </body>
</html>