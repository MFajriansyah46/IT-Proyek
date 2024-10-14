<!DOCTYPE html>
<html lang="en" class="h-full bg-white-100">
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
  <body class="bg-gray-100">
    @if (session()->has('registration-success'))
      <ul class="fixed top-0 right-3/8 w-96 flex p-4 mt-2 rounded-md bg-white font-medium shadow-sm max-w-md" id="login-eror">
        <li class="my-auto text-lg">
          {{ session('registration-success') }}
        </li>
        <li class="my-auto ml-auto" >
          <button class="ml-auto hover:bg-gray-200 rounded-full justify-center" id="button-login-eror">
            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="m7.757 16.243l8.486-8.486m0 8.486L7.757 7.757M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10"/></svg>
          </button>
        </li>
      </ul>
    @endif

    @if (session()->has('loginError'))
    <ul class="fixed top-0 right-3/8 w-96 flex p-4 mt-2 rounded-md bg-white font-medium text-red-500 shadow-sm max-w-md" id="login-eror">
      <li class="my-auto text-lg">
        {{ session('loginError') }}
      </li>
      <li class="my-auto ml-auto" >
        <button class="ml-auto hover:bg-gray-200 rounded-full justify-center" id="button-login-eror">
          <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="m7.757 16.243l8.486-8.486m0 8.486L7.757 7.757M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10"/></svg>
        </button>
      </li>
    </ul>
    @endif
    {{ $slot }}
  </body>
</html>