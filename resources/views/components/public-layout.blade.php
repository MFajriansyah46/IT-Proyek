<?php use App\Models\Rent; $rent = Rent::firstWhere('id_penyewa', auth('tenant')->user()->id);?>
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
  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
  <title>Bang Raja</title>
</head class="h-full">
  <body>
  <header class="bg-white shadow">
        <!-- <div class="mx-auto max-w-7xl px-4 py-0 sm:px-6 lg:px-8 block md:hidden">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900"></h1>
        </div> -->

        <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8 hidden md:block">
          <h1 class="text-sm tracking-tight">v1.0</h1>
        </div>
    </header>
    
    <nav class="bg-gray-900">
      <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0 mr-1">
              <img class="h-10 w-auto" src="/images/logo bang raja3.png" alt="Your Company">
            </div>
            <div class="rounded-md px-4 py-2 text-sm font-medium text-white">
              <svg width="10" height="24" xmlns="http://www.w3.org/2000/svg"> <rect x="4" y="0" width="1" height="100" fill="white" /></svg>
            </div>
            <div class="hidden md:block">
              <div class=" flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline" aria-current="page">Home</a>
                <a href="/rooms-list" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline">Rooms</a>
                <a href="/#" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline">About</a>
                <a href="/#" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline">Help</a>
              </div>
            </div>
          </div>

          <div class="hidden md:block">
            
            @auth('tenant')

            <button id="profile-button">
              <img class="h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
              
            <div class="absolute right-6 mt-2 w-56 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="profile-button" tabindex="-1">
              <ul class="py-1" role="none">
                <li>
                  <div class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                      <button id="openProfileUserBtn" class="flex pr-28">
                          <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="#969696" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
                          <h1 class="text-base ">Profile</h1>
                      </button>
                  </div>
                </li>
                <li>
                  <div class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                      <button id="openProfileUserBtn" class="flex pr-14">
                        <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#969696" d="m10.821 2.003l.1.017l8.5 2a.75.75 0 0 1 .572.627L20 4.75v14.5a.75.75 0 0 1-.48.7l-.098.03l-8.5 2a.75.75 0 0 1-.915-.628L10 21.25V2.75a.75.75 0 0 1 .723-.75zm.679 1.694v16.606l7-1.647V5.344zM9 4v1.5H5.5v13H9V20H4.75a.75.75 0 0 1-.743-.648L4 19.25V4.75a.75.75 0 0 1 .648-.743L4.75 4zm5 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2"/></svg>
                        <h1 class="text-base ">My Room</h1>
                      </button>
                  </div>
                </li>
                <li>
                  <form method="post" action="/logout" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">
                      @csrf
                      <button type="submit" class="flex pr-28">                           
                          <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" viewBox="0 0 24 24"><g fill="none" stroke="#969696" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="48" stroke-dashoffset="48" d="M16 5v-1c0 -0.55 -0.45 -1 -1 -1h-9c-0.55 0 -1 0.45 -1 1v16c0 0.55 0.45 1 1 1h9c0.55 0 1 -0.45 1 -1v-1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="48;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M10 12h11"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="6" stroke-dashoffset="6" d="M21 12l-3.5 -3.5M21 12l-3.5 3.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="0.2s" values="6;0"/></path></g></svg>
                          <h1 class="text-base">Logout</h1>                           
                      </button>
                  </form>
                </li>
              <!-- @ if(! ) -->
                <li>
                  <div class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                      <button id="openProfileUserBtn" class="flex pr-14">
                        <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 48 48"><g fill="none" stroke="#969696" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><circle cx="24" cy="12" r="8"/><path d="M42 44c0-9.941-8.059-18-18-18S6 34.059 6 44m13-5h10m-5-5v10"/></g></svg>
                        <h1 class="text-base ">Add roomate</h1>
                      </button>
                  </div>
                </li>

              <!-- @ else -->
                <li>
                  <small class="pl-4 text-gray-700">My roomate</small>
                </li>
                <li>
                  <div class="flex items-center px-4 py-2 -mt-1 text-sm text-gray-700 hover:bg-gray-100">
                      <button id="openProfileUserBtn" class="flex">
                        <img class="mr-2 h-8 w-auto rounded-full my-auto" src="/images/default-profile.jpg" alt="" >
                        <div class="flex flex-col justify-start items-start">
                            <h1 class="text-sm ">M. Fajriansyah</h1>
                            <!-- <small class="text-gray-500">6282251964943</small> -->
                             <!-- <span id="countdownPublic"></span> -->
                        </div>
                      </button>
                  </div>
                </li>

                <!-- @ endif -->
              </ul>
            </div>
            @else
              <a href="/login" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline" aria-current="page">Login</a>     
            @endauth
            </div>
            <div class="block md:hidden">
              <div class=" flex flex-col items-baseline space-x-4">       
                <!-- <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:underline" aria-current="page">Login</a> -->
                 <button class="px-1 rounded-md hover:bg-slate-600">
                  <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="white" fill-rule="evenodd" d="M3 16h18v2H3zm0-5h18v2H3zm0-5h18v2H3z"/></svg>
                 </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <main>
      {{ $slot }}
    </main>
  </body>
  @if($rent)
    <script>
      $(document).ready(function() {
        // Set tanggal keluar dari variabel Blade ke dalam JavaScript
        const tanggalKeluar = new Date("{{ $rent->tanggal_keluar }}").getTime();

        // Update hitungan mundur setiap 1 detik
        const countdownInterval = setInterval(function() {
          // Dapatkan waktu saat ini
          const now = new Date().getTime();

          // Hitung selisih waktu
          const distance = tanggalKeluar - now;

          // Hitung hari, jam, menit, dan detik
          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Tampilkan hasil hitung mundur
          $('#countdownPublic').text(`${days}d ${hours}h ${minutes}m ${seconds}s`);

          // Jika hitungan mundur selesai
          if (distance < 0) {
              clearInterval(countdownInterval);
              $('#countdownPublic').text("Waktu telah habis!");
              window.location.href='/timeout/{{ $rent->token }}';
          }
        }, 1000);
      });
    </script>
  @endif

  @if (session()->has('payment-success')) 
    <ul class="absolute top-20 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-md bg-white text-gray-600 font-medium shadow-lg border max-w-lg flex px-4 py-6 gap-8" id="login-eror">
      <li class="my-auto text-lg">
        {{ session('payment-success') }}
        <div class="w-full flex justify-center">
            <a href="#" class="w-32 px-3 py-1.5 text-lg text-blue-400 hover:text-blue-300 font-semibold">My Room &raquo;</a>
        </div>
      </li>
      <li class="my-auto ml-auto" >
        <button class="ml-auto hover:bg-gray-200 rounded-md justify-center" id="button-login-eror">
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </li>
    </ul>

  @endif
</html>


