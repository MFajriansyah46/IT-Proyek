<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/assets/jquery-3.7.1.js"></script>
  <script src="/assets/jquery.js"></script>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
  <title>Bang Raja</title>
</head class="h-full">
  <body class="bg-gray-100">
    @if (session()->has('registration-success'))
      <ul class="absolute top-16 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-md bg-white font-medium text-red-500 shadow-sm max-w-md flex px-4 py-6 gap-8" id="login-eror">
        <li class="my-auto text-lg">
          {{ session('registration-success') }}
        </li>
        <li class="my-auto ml-auto" >
          <button class="ml-auto text-gray-400 hover:bg-gray-200 rounded-md justify-center" id="button-login-eror">
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </button>
        </li>
      </ul>
    @endif

    @if (session()->has('loginError'))
    <ul class="absolute top-16 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-md bg-white font-medium shadow-sm max-w-md flex px-4 py-6 gap-8" id="login-eror">
      <li class="my-auto text-lg w-80 hover:bg-gray-300 text-red-500">
        {{ session('loginError') }}
      </li>
      <li class="my-auto ml-auto" >
        <button class="ml-auto text-gray-400 hover:bg-gray-200 rounded-md justify-center" id="button-login-eror">
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </li>
    </ul>
    @endif
    {{ $slot }}
  </body>
</html>