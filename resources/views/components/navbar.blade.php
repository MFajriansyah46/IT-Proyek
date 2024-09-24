<nav class="flex flex-col bg-gray-800 w-64">
    <div class="flex flex-row items-center p-8 gap-3">
        <img class="h-12 w-12" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="">
        <h3 class="text-gray-200 text-xl">Kos Bang Raja</h3>
    </div>

    <x-nav-link href="/" :active="request()->is('/')"><svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" viewBox="0 0 24 24"><g fill="#e5e7eb"><path d="M9.883 2.207a1.9 1.9 0 0 1 2.087 1.522l.025.167L12 4v7a1 1 0 0 0 .883.993L13 12h6.8a2 2 0 0 1 2 2a1 1 0 0 1-.026.226A10 10 0 1 1 9.504 2.293l.27-.067z"/><path d="M14 3.5V9a1 1 0 0 0 1 1h5.5a1 1 0 0 0 .943-1.332a10 10 0 0 0-6.11-6.111A1 1 0 0 0 14 3.5"/></g></svg>Dashboard</x-nav-link>
    <x-nav-link href="/users" :active="request()->is('users')"><svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.4 3.4 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.4 3.4 0 0 0 15 11a3.5 3.5 0 0 0 0-7"/></svg>Users</x-nav-link>
    <x-nav-link href="/rooms" :active="request()->is('rooms')"><svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="M3 21v-2h2V3h10v1h4v15h2v2h-4V6h-2v15zm8-8q.425 0 .713-.288T12 12t-.288-.712T11 11t-.712.288T10 12t.288.713T11 13"/></svg>Rooms</x-nav-link>
    <x-nav-link href="/buildings" :active="request()->is('buildings')"><svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="M10 10.111V1l11 6v14H3V7z"/></svg>Buildings</x-nav-link>
</nav>

