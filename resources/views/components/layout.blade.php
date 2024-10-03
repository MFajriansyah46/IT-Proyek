<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="/assets/jquery-3.7.1.js"></script>
    <script src="/assets/jquery.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Bang Raja</title>
  </head class="h-full">
  <body class="flex h-screen w-screen fixed">
    <x-navbar></x-navbar>
    <main class="flex-1">
      <header class="shadow-lg relative">
        <div class="px-4 py-8 bg-gray-50 shadow m-0"></div>
      </header>
      <h1 class="text-4xl font-bold text-gray-800 mt-8 mb-6 mx-auto px-4 relative"> {{ $title }} </h1>
      <div class="container mx-auto px-4 h-screen overflow-scroll">{{ $slot }}</div>
    </main>
  </body>
</html>