<nav class="flex flex-col bg-gray-800 w-auto" id="fullBar" hidden="true">
    <div class="flex flex-row items-center px-4 py-10 gap-3 hover:bg-slate-500">
        <img src="/images/logo bang raja3.png" class="h-20 w-auto" alt="">
        <h3 class="text-gray-200 text-4xl">Bang Raja</h3>
    </div>
    <x-nav-link href="/" :active="request()->is('/')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><g fill="none" stroke="#e5e7eb" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5z"/><path d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3z"/></g></svg>Dashboard</x-nav-link>
    <x-nav-link href="/users" :active="request()->is('users')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><g fill="none" stroke="#e5e7eb" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></g></svg>Users</x-nav-link>
    <x-nav-link href="/rooms" :active="request()->is('rooms')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="m10.821 2.003l.1.017l8.5 2a.75.75 0 0 1 .572.627L20 4.75v14.5a.75.75 0 0 1-.48.7l-.098.03l-8.5 2a.75.75 0 0 1-.915-.628L10 21.25V2.75a.75.75 0 0 1 .723-.75zm.679 1.694v16.606l7-1.647V5.344zM9 4v1.5H5.5v13H9V20H4.75a.75.75 0 0 1-.743-.648L4 19.25V4.75a.75.75 0 0 1 .648-.743L4.75 4zm5 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2"/></svg>Rooms</x-nav-link>
    <x-nav-link href="/buildings" :active="request()->is('buildings')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="M10 10.111V1l11 6v14H3V7zm2-5.742v8.82l-7-3.111V19h14V8.187z"/></svg>Buildings</x-nav-link>
    
    <form method="post" action="/owner-logout">
        @csrf
        <button type="submit">
            <h1 class="text-md text-white ml-8">Logout</h1>
        </button>
    </form>
    
</nav>

<!-- <nav class="flex flex-col bg-gray-800 w-auto" id="halfBar">
    <div class="flex flex-row items-center px-4 py-10 gap-3 hover:bg-slate-500">
        <img src="/images/logo bang raja3.png" class="h-14 w-auto" alt="">
    </div>
   
    <x-nav-link href="/" :active="request()->is('/')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><g fill="none" stroke="#e5e7eb" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5z"/><path d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3z"/></g></svg></x-nav-link>
    <x-nav-link href="/users" :active="request()->is('users')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><g fill="none" stroke="#e5e7eb" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></g></svg></x-nav-link>
    <x-nav-link href="/rooms" :active="request()->is('rooms')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="m10.821 2.003l.1.017l8.5 2a.75.75 0 0 1 .572.627L20 4.75v14.5a.75.75 0 0 1-.48.7l-.098.03l-8.5 2a.75.75 0 0 1-.915-.628L10 21.25V2.75a.75.75 0 0 1 .723-.75zm.679 1.694v16.606l7-1.647V5.344zM9 4v1.5H5.5v13H9V20H4.75a.75.75 0 0 1-.743-.648L4 19.25V4.75a.75.75 0 0 1 .648-.743L4.75 4zm5 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2"/></svg></x-nav-link>
    <x-nav-link href="/buildings" :active="request()->is('buildings')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="M10 10.111V1l11 6v14H3V7zm2-5.742v8.82l-7-3.111V19h14V8.187z"/></svg></x-nav-link>

</nav> -->
