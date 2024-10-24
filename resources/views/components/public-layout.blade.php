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
  <header class="bg-white shadow">
        <!-- <div class="mx-auto max-w-7xl px-4 py-0 sm:px-6 lg:px-8 block md:hidden">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900"></h1>
        </div> -->

        <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8 hidden md:block">
          <h1 class="text-sm tracking-tight">v1.0</h1>
        </div>
    </header>
    
    <nav class="bg-gray-900">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
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
                <a href="/" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:underline" aria-current="page">Home</a>
                <a href="/rooms-list" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:underline">Rooms</a>
                <a href="/#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:underline">About</a>
                <a href="/#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:underline">Help</a>
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
                            <small class="text-gray-500">6282251964943</small>
                        </div>
                      </button>
                  </div>
                </li>
              <!-- @ endif -->
              </ul>
            </div>
            @else
              <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:underline" aria-current="page">Login</a>     
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
</html>