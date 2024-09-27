<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        @vite('resources/js/jquery-3.7.1.min.js')
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <title>Bang Raja</title>
    </head class="h-full">
    <body class="flex h-screen w-screen fixed">
        <x-navbar></x-navbar>
        <main class="flex-1">
            <header class="shadow-lg relative">
                <div class="px-4 py-8 bg-yellow-300 shadow m-0">
                </div>
            </header>
            <div class="container mx-auto px-4 h-screen overflow-scroll">
                <h1 class="text-4xl font-bold text-gray-800 mt-8 mb-6"> {{ $title }} </h1>
                {{ $slot }}
            </div>
        </main>
    </body>
</html>