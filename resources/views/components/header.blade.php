<header class="flex flex-row shadow-lg relative pl-3 pr-6 py-3 bg-gray-50">
    <ul>
        <li class="my-auto">
            <button class="rounded-full hover:bg-gray-300 hover:rounded-full" id="buttonBar">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5rem" height="2.5rem" viewBox="0 0 24 24">
                    <path fill="#1f2937" fill-rule="evenodd" d="M3 16h18v2H3zm0-5h18v2H3zm0-5h18v2H3z" />
                </svg>
            </button>
        </li>
    </ul>
    <ul class="flex ml-auto gap-1">
        <li class="my-auto">
            <img class="h-9 w-9 rounded-full"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="">
        </li>
        <li class="my-auto mr-2 px-1 hover:rounded-md hover:bg-gray-200 gap-1">
            <!-- Dropdown container -->
            <div class="relative inline-block text-left">
                <!-- Dropdown toggle button -->
                <button class="flex" id="menu-button" aria-expanded="true" aria-haspopup="true">
                    {{ auth()->user()->username }}
                    <svg class="my-auto" width="20" height="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div class="absolute right-0 mt-2 w-56 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <!-- Profile option -->
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem" tabindex="-1" id="menu-item-0">
                            <!-- Profile Icon -->
                            <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.938 13.938 0 0112 15c1.657 0 3.232.262 4.879.804M12 12a5 5 0 100-10 5 5 0 000 10zm-7 10a7 7 0 1114 0H5z" />
                            </svg>
                            Profile
                        </a>
                        <form method="post" action="/owner-logout" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">
                            @csrf
                            <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-6 0v-1m0-4a3 3 0 016 0v1" /></svg>
                            <button type="submit"> Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</header>