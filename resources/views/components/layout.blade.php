<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="/assets/jquery-3.7.1.js"></script>
    <script src="/assets/jquery.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Bang Raja</title>
  </head class="h-full">

  
  <body>
    <div class="flex h-screen w-screen fixed">
      <x-navbar></x-navbar>

      <main class="flex-1">
        <header class="shadow-lg relative p-3 bg-gray-50">
          
          <button class="rounded-full hover:bg-gray-300 hover:rounded-full p-1" id="buttonBar">
            <svg xmlns="http://www.w3.org/2000/svg" width="2.5rem" height="2.5rem" viewBox="0 0 24 24"><path fill="#1f2937" fill-rule="evenodd" d="M3 16h18v2H3zm0-5h18v2H3zm0-5h18v2H3z"/></svg>
          </button>

        </header>
        
        <div class="mx-auto px-4 h-screen overflow-scroll">
          {{ $slot }}
        </div>
      </main>
    </div>
  </body>

</html>