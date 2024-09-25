<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Bang Raja</title>
</head class="h-full">
<body>
<div class="flex h-screen">
    
    <x-navbar></x-navbar>

    
    <main class="flex-1">
        <header>
            <div class="bg-yellow-300 shadow m-0">
                <div class="mx-0 px-4 py-8 sm:px-6 lg:px-8 border-b-2 border-gray-300">
                    
                </div>
            </div>
        </header>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mt-8"> {{ $title }} </h1>
            {{ $slot }}
        </div>
    </main>
</body>
</html>