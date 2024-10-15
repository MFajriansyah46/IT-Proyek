<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/assets/jquery-3.7.1.js"></script>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <title>Bang Raja</title>
</head class="h-full">

<body>
  <div class="flex h-screen w-screen fixed">
    <x-navbar></x-navbar>
    <main class="flex-1">


      <x-header></x-header>

      <div class="mx-auto px-4 h-screen overflow-scroll">
        {{ $slot }}
      </div>
    </main>
  </div>
</body>

<x-modal></x-modal>

</html>