<nav class="flex flex-col bg-gray-800 w-auto">
    <div class="flex flex-row items-center p-8 gap-3 hover:bg-slate-500">
        <img src="/images/logo bang raja3.png" class="h-20 w-auto" alt="">
        <h3 class="text-gray-200 text-3xl">Bang Raja</h3>
    </div>
    <x-nav-link href="/" :active="request()->is('/')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><g fill="none" stroke="#e5e7eb" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5z"/><path d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3z"/></g></svg>Dashboard</x-nav-link>
    <x-nav-link href="/users" :active="request()->is('users')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><g fill="none" stroke="#e5e7eb" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></g></svg>Users</x-nav-link>
    <x-nav-link href="/rooms" :active="request()->is('rooms')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="m10.821 2.003l.1.017l8.5 2a.75.75 0 0 1 .572.627L20 4.75v14.5a.75.75 0 0 1-.48.7l-.098.03l-8.5 2a.75.75 0 0 1-.915-.628L10 21.25V2.75a.75.75 0 0 1 .723-.75zm.679 1.694v16.606l7-1.647V5.344zM9 4v1.5H5.5v13H9V20H4.75a.75.75 0 0 1-.743-.648L4 19.25V4.75a.75.75 0 0 1 .648-.743L4.75 4zm5 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2"/></svg>Rooms</x-nav-link>
    <x-nav-link href="/buildings" :active="request()->is('buildings')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="M10 10.111V1l11 6v14H3V7zm2-5.742v8.82l-7-3.111V19h14V8.187z"/></svg>Buildings</x-nav-link>

</nav>

<!-- <nav class="flex flex-col bg-gray-800 w-auto">
    <div class="flex flex-row items-center p-8 gap-3 hover:bg-slate-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="2.6rem" height="2.85rem" viewBox="0 0 256 264"><path fill="#ff2d20" d="M255.856 59.62c.095.351.144.713.144 1.077v56.568c0 1.478-.79 2.843-2.073 3.578L206.45 148.18v54.18a4.14 4.14 0 0 1-2.062 3.579l-99.108 57.053c-.227.128-.474.21-.722.299c-.093.03-.18.087-.278.113a4.15 4.15 0 0 1-2.114 0c-.114-.03-.217-.093-.325-.134c-.227-.083-.464-.155-.68-.278L2.073 205.938A4.13 4.13 0 0 1 0 202.36V32.656c0-.372.052-.733.144-1.083c.031-.119.103-.227.145-.346c.077-.216.15-.438.263-.639c.077-.134.19-.242.283-.366c.119-.165.227-.335.366-.48c.119-.118.274-.206.408-.309c.15-.124.283-.258.453-.356h.005L51.613.551a4.14 4.14 0 0 1 4.125 0l49.546 28.526h.01c.165.104.305.232.454.351c.134.103.284.196.402.31c.145.149.248.32.371.484c.088.124.207.232.279.366c.118.206.185.423.268.64c.041.118.113.226.144.35c.095.351.144.714.145 1.078V138.65l41.286-23.773V60.692c0-.36.052-.727.145-1.072c.036-.124.103-.232.144-.35c.083-.217.155-.44.268-.64c.077-.134.19-.242.279-.366c.123-.165.226-.335.37-.48c.12-.118.269-.206.403-.309c.155-.124.289-.258.454-.356h.005l49.551-28.526a4.13 4.13 0 0 1 4.125 0l49.546 28.526c.175.103.309.232.464.35c.128.104.278.197.397.31c.144.15.247.32.37.485c.094.124.207.232.28.366c.118.2.185.423.267.64c.047.118.114.226.145.35m-8.115 55.258v-47.04l-17.339 9.981l-23.953 13.792v47.04l41.297-23.773zm-49.546 85.095V152.9l-23.562 13.457l-67.281 38.4v47.514zM8.259 39.796v160.177l90.833 52.294v-47.505L51.64 177.906l-.015-.01l-.02-.01c-.16-.093-.295-.227-.444-.34c-.13-.104-.279-.186-.392-.3l-.01-.015c-.134-.129-.227-.289-.34-.433c-.104-.14-.227-.258-.31-.402l-.005-.016c-.093-.154-.15-.34-.217-.515c-.067-.155-.154-.3-.196-.464v-.005c-.051-.196-.061-.403-.082-.604c-.02-.154-.062-.309-.062-.464V63.57L25.598 49.772l-17.339-9.97zM53.681 8.893L12.399 32.656l41.272 23.762L94.947 32.65L53.671 8.893zm21.468 148.298l23.948-13.786V39.796L81.76 49.778L57.805 63.569v103.608zM202.324 36.935l-41.276 23.762l41.276 23.763l41.271-23.768zm-4.13 54.676l-23.953-13.792l-17.338-9.981v47.04l23.948 13.787l17.344 9.986zm-94.977 106.006l60.543-34.564l30.264-17.272l-41.246-23.747l-47.489 27.34l-43.282 24.918z"/></svg>
    </div>
   
    <x-nav-link href="/" :active="request()->is('/')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><g fill="none" stroke="#e5e7eb" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5z"/><path d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3z"/></g></svg></x-nav-link>
    <x-nav-link href="/users" :active="request()->is('users')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><g fill="none" stroke="#e5e7eb" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></g></svg></x-nav-link>
    <x-nav-link href="/rooms" :active="request()->is('rooms')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="m10.821 2.003l.1.017l8.5 2a.75.75 0 0 1 .572.627L20 4.75v14.5a.75.75 0 0 1-.48.7l-.098.03l-8.5 2a.75.75 0 0 1-.915-.628L10 21.25V2.75a.75.75 0 0 1 .723-.75zm.679 1.694v16.606l7-1.647V5.344zM9 4v1.5H5.5v13H9V20H4.75a.75.75 0 0 1-.743-.648L4 19.25V4.75a.75.75 0 0 1 .648-.743L4.75 4zm5 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2"/></svg></x-nav-link>
    <x-nav-link href="/buildings" :active="request()->is('buildings')"><svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="#e5e7eb" d="M10 10.111V1l11 6v14H3V7zm2-5.742v8.82l-7-3.111V19h14V8.187z"/></svg></x-nav-link>

</nav> -->

<!-- <button id="myButton">Klik</button>
    <script>
    $(document).ready(function(){
        $('#myButton').click(function(){
        alert('Tombol ditekan');
        });
    });
</script> -->