<?php use App\Models\Rent; ?>
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
      <div class="mx-auto px-4 py-2 sm:px-6 lg:px-8 hidden md:block">
        <h1 class="text-sm tracking-tight">v1.0</h1>
      </div>
    </header>
    <nav class="sticky top-0 bg-gray-900 py-2 z-50">
      <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0 mr-1">
              <img class="h-14 w-auto" src="/images/logo bang raja3.png" alt="Your Company">
            </div>
            <div class="rounded-md px-4 py-2 text-sm font-medium text-white">
              <svg width="10" height="24" xmlns="http://www.w3.org/2000/svg"> 
                <rect x="4" y="0" width="1" height="100" fill="white" />
              </svg>
            </div>
            <div class="hidden md:block">
              <div class="flex items-baseline space-x-4">
                <a href="/" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline" aria-current="page">Home</a>
                <a href="/rooms" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline">Rooms</a>
                <a href="/about" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline">About</a>
                <a href="/help" class="rounded-md px-3 py-2 text-lg font-medium text-white hover:underline">Help</a>
              </div>
            </div>
          </div>
          <!-- Bagian lainnya tetap sama -->
          <div class="hidden md:block">

            @auth('tenant')
              <?php $rent = Rent::firstWhere('id_penyewa', auth('tenant')->user()->id); ?>

              <button id="profile-button">
                @if(auth('tenant')->user()->image)
                  <img class="h-9 w-9 rounded-full" src="/storage/{{ auth('tenant')->user()->image }}" alt="">
                @else
                  <svg class="h-9 w-9 rounded-full" xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" viewBox="0 0 24 24">
                    <path fill="#f3f4f6" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6m0 14c-2.03 0-4.43-.82-6.14-2.88a9.95 9.95 0 0 1 12.28 0C16.43 19.18 14.03 20 12 20" />
                  </svg>
                @endif
              </button>

              <div class="z-50 absolute right-6 mt-2 w-60 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="profile-button" tabindex="-1">
                <ul class="py-1" role="none">
                    <li>
                        <div class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <button id="tenantProfileBtn" class="flex pr-28">
                                <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="#969696" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
                                <h1 class="text-base ">Profile</h1>
                            </button>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <a href="/myroom" class="flex pr-14">
                            <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#969696" d="m10.821 2.003l.1.017l8.5 2a.75.75 0 0 1 .572.627L20 4.75v14.5a.75.75 0 0 1-.48.7l-.098.03l-8.5 2a.75.75 0 0 1-.915-.628L10 21.25V2.75a.75.75 0 0 1 .723-.75zm.679 1.694v16.606l7-1.647V5.344zM9 4v1.5H5.5v13H9V20H4.75a.75.75 0 0 1-.743-.648L4 19.25V4.75a.75.75 0 0 1 .648-.743L4.75 4zm5 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2"/></svg>
                            <h1 class="text-base ">My Room</h1>
                            </a>
                        </div>
                    </li>
                    <li>
                        <form method="post" @if(auth('tenant')->user()->google_token) action="/googleLogout" @else action="/logout" @endif class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">
                            @csrf
                            <input type="hidden" name="id" value="{{ auth('tenant')->user()->id }}">
                            <input type="hidden" name="google_token" value="{{ auth('tenant')->user()->google_token }}">
                            <button type="submit" class="flex pr-28">
                                <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" viewBox="0 0 24 24"><g fill="none" stroke="#969696" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="48" stroke-dashoffset="48" d="M16 5v-1c0 -0.55 -0.45 -1 -1 -1h-9c-0.55 0 -1 0.45 -1 1v16c0 0.55 0.45 1 1 1h9c0.55 0 1 -0.45 1 -1v-1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="48;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M10 12h11"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="6" stroke-dashoffset="6" d="M21 12l-3.5 -3.5M21 12l-3.5 3.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="0.2s" values="6;0"/></path></g></svg>
                                <h1 class="text-base">Logout</h1>
                            </button>
                        </form>
                    </li>
                <!-- Add Roommate -->
                @if(auth('tenant')->user()->roommate)
                    <li class="pt-2">
                        <small class="pl-4 text-gray-700">My Roommate</small>
                    </li>
                    <li class="group relative">
                        <div class="flex items-center px-4 py-1 text-sm text-gray-700 hover:bg-gray-100 justify-between w-full">
                            <div class="flex items-center">
                                <img class="w-8 h-8 rounded-full mr-2"
                                src="{{ auth('tenant')->user()->roommate->profile_photo ? asset('storage/' . auth('tenant')->user()->roommate->profile_photo): asset('images/default-profile.jpg') }}" alt="{{ auth('tenant')->user()->roommate->name }}">
                                <div class="flex flex-col text-left pl-1">
                                    <h1 class="text-base">{{ auth('tenant')->user()->roommate->name }}</h1>
                                    <span class="text-xs text-gray-500">{{ auth('tenant')->user()->roommate->phone_number }}</span>
                                </div>
                            </div>
                            <!-- Delete Button -->
                            <button type="button" id="deleteRoommateBtn" class="hidden group-hover:block text-gray-400 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9 3v1H4v2h1v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1V4h-5V3zm0 5h2v9H9zm4 0h2v9h-2z"/>
                                </svg>
                            </button>
                        </div>
                    </li>
                  @else
                    <li>
                        <button id="addRoommate" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full">
                            <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                                    <circle cx="24" cy="12" r="8"/>
                                    <path d="M42 44c0-9.941-8.059-18-18-18S6 34.059 6 44m13-5h10m-5-5v10"/>
                                </g>
                            </svg>
                            <h1 class="text-base">Add Roommate</h1>
                        </button>
                      </li>
                    @endif
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

  <x-public-popup></x-public-popup>

  <footer class="bg-gray-900 text-white py-12">
      <div class="container mx-auto px-4">
          <div class="grid md:grid-cols-3 gap-10">
              <div>
                  <h3 class="text-2xl font-bold mb-4">Kos Bang Raja</h3>
                  <p class="text-gray-300">Tempat tinggal nyaman dan aman untuk mahasiswa dan profesional muda.</p>
              </div>
              <div>
                  <h4 class="text-xl font-semibold mb-4">Kontak Kami</h4>
                  <p>📍 Jalan Kos Bang Raja No. 123</p>
                  <p>☎️ +62 812-3456-7890</p>
                  <p>✉️ info@kosbangraja.com</p>
              </div>
              <div>
                  <h4 class="text-xl font-semibold mb-4">Ikuti Kami</h4>
                  <div class="flex space-x-4">
                      <a href="#" class="hover:text-indigo-300">Instagram</a>
                      <a href="#" class="hover:text-indigo-300">WhatsApp</a>
                      <a href="#" class="hover:text-indigo-300">Facebook</a>
                  </div>
              </div>
          </div>
          <div class="text-center mt-10 border-t border-gray-700 pt-6">
              <p>© 2024 Kos Bang Raja. Hak Cipta Dilindungi.</p>
          </div>
      </div>
  </footer>
</html>
