<x-layout class="my-4">
    <x-slot:title>{{ $title }}</x-slot>

    <x-table.header :headers="['Nama','Email','Tanggal Verifikasi','Aksi']">
        @foreach ($users as $user)
            <tr class="hover:bg-gray-100">
                <x-table.data>{{ $user->name }}</x-table.data>
                <x-table.data>{{ $user->email }}</x-table.data>
                <x-table.data>{{ $user->email_verified_at }}</x-table.data>
                <x-table.data> 
                    <div class="relative inline-block text-left">
                    <div>
                    <button 
                        type="button" 
                        class="inline-flex w-full justify-center gap-x-1.5 rounded-md text-sm font-semibold text-gray-900 hover:bg-gray-50" 
                        id="menu-button" 
                        aria-expanded="false" 
                        aria-haspopup="true"
                        onclick="toggleDropdown()"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                        </svg>
                    </button>
                    </div>

                    <div 
                        class="absolute right-0 z-10 mt-2 w-auto origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" 
                        role="menu" 
                        aria-orientation="vertical" 
                        aria-labelledby="menu-button" 
                        tabindex="-1"
                        id="dropdown-menu"
                    >
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 flex items-center space-x-2" role="menuitem" tabindex="-1" id="menu-item-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                <span>Edit</span>
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 flex items-center space-x-2" role="menuitem" tabindex="-1" id="menu-item-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                <span>Delete</span>
                            </a>
                        </div>
                    </div>
                    </div>

                    <x-aksi>
                    </x-aksi>

                </x-table.data>
            </tr>
        @endforeach
    </x-table.header> 
</x-layout>