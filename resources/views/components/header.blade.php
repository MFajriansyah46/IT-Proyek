<header class="flex flex-row shadow-lg relative pl-3 pr-6 py-3 bg-gray-50">
    <ul>
        <li class="my-auto">
            <button class="p-1 rounded-full hover:bg-gray-300 hover:rounded-full bg-gray-200" id="buttonBar">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5rem" height="2.5rem" viewBox="0 0 24 24">
                    <path fill="#1f2937" fill-rule="evenodd" d="M3 16h18v2H3zm0-5h18v2H3zm0-5h18v2H3z" />
                </svg>
            </button>
        </li>
    </ul>
    <ul class="flex ml-auto gap-1">
        <li class="my-auto">
            <img class="h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        </li>
        <li class="my-auto mr-2 px-1 hover:rounded-md hover:bg-gray-200 gap-1">
            <!-- Dropdown container -->
            <div class="relative inline-block text-left">
                <!-- Dropdown toggle button -->
                <button class="flex" id="menu-button" aria-expanded="true" aria-haspopup="true">
                    <p>{{ auth('owner')->user()->username }}</p>
                    <svg class="my-auto focus:mt-1" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div class="absolute right-0 mt-4 w-56 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <!-- Profile option -->
                        <div class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <!-- Profile Icon -->
                            <button id="openProfileBtn" class="flex">
                                <svg class="mr-3 h-7 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="#969696" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
                                <h1 class="text-base pr-28">Profile</h1>
                            </button>
                        </div>
                        <form method="post" action="/owner-logout" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">
                            @csrf
                            <button type="submit" class="flex">                           
                                <svg class="mr-3 h-6 w-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" viewBox="0 0 24 24"><g fill="none" stroke="#969696" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="48" stroke-dashoffset="48" d="M16 5v-1c0 -0.55 -0.45 -1 -1 -1h-9c-0.55 0 -1 0.45 -1 1v16c0 0.55 0.45 1 1 1h9c0.55 0 1 -0.45 1 -1v-1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="48;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M10 12h11"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="6" stroke-dashoffset="6" d="M21 12l-3.5 -3.5M21 12l-3.5 3.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="0.2s" values="6;0"/></path></g></svg>
                                <h1 class="text-base  pr-28">Logout</h1>                           
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</header>