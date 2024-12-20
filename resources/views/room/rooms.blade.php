<x-layout>

    <ul class="flex mt-8 mb-4">
        <li>
            <h1 class="text-5xl font-bold text-gray-800">Rooms</h1>
        </li>
        <li class="mt-auto my-auto ml-auto">
            <button type="button"
                class="mb-2 px-4 py-2 text-sm font-medium text-white bg-yellow-300 rounded-md hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                <a href="/rooms/add" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 16 16">
                        <path fill="white" fill-rule="evenodd"
                            d="M4.5 2a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zM2 4v9.5a.5.5 0 0 0 .5.5H12v-1H3V4zm6.5.5v2h-2v1h2v2h1v-2h2v-1h-2v-2z"
                            clip-rule="evenodd" />
                    </svg>
                    <h1 class="my-auto ml-2 text-lg">Add</h1>
                </a>
            </button>
        </li>
    </ul>

    <x-table.header :headers="['Room number',  'Price', 'Internet speed','Image', 'Action']">
        @foreach ($rooms as $i=>$room)
            <tr class="hover:bg-yellow-100">
                <x-table.data class="text-center">{{ $i+1 }}</x-table.data>
                <x-table.data>{{ $room->building->unit_bangunan }}{{ $room->no_kamar }}</x-table.data>
                <x-table.data>{{ $room->harga_kamar }}</x-table.data>
                <x-table.data>{{ $room->kecepatan_internet }}</x-table.data>
                <x-table.data class="text-center">
                    @if ($room->gambar_kamar)
                        <img src="{{ asset('storage/' . $room->gambar_kamar) }}" class="w-28 h-16 object-cover" alt="Room image">
                    @else
                        <span>Tidak ada</span>
                    @endif
                </x-table.data>
                <x-table.data>
                    <div class="flex gap-1 my-1">
                    <a href="/rooms/edit/{{ $room->remember_token }}">
                        <button type="button" class="pl-1 pb-1 text-sm font-medium text-white bg-blue-600 rounded-sm hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                            <!-- Icon Edit -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="1.75rem" viewBox="0 0 32 32">
                                <path fill="white" d="M25 4.031c-.766 0-1.516.297-2.094.875L13 14.781l-.219.219l-.062.313l-.688 3.5l-.312 1.468l1.469-.312l3.5-.688l.312-.062l.219-.219l9.875-9.906A2.968 2.968 0 0 0 25 4.03zm0 1.938c.234 0 .465.12.688.343c.445.446.445.93 0 1.375L16 17.376l-1.719.344l.344-1.719l9.688-9.688c.222-.222.453-.343.687-.343zM4 8v20h20V14.812l-2 2V26H6V10h9.188l2-2z" />
                            </svg>
                        </button>
                    </a>
                    <form action="{{ route('rooms.delete', $room->id_kamar) }}" class="room-delete-form" id="form-delete-{{ $room->id_kamar }}">
                        @csrf
                        <input type="hidden" name="remember_token" value="{{ $room->remember_token }}">
                        <button type="button" class="delete-room-button" data-room-id="{{ $room->id_kamar }}">
                            <div class="px-1 text-sm font-medium text-white bg-red-600 rounded-sm hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.75rem" height="2rem" viewBox="0 0 24 24">
                                    <path fill="white" d="M5 21V6H4V4h5V3h6v1h5v2h-1v15zm2-2h10V6H7zm2-2h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                </svg>
                            </div>
                        </button>
                    </form>
                </div>
                </x-table.data>
            </tr>
        @endforeach
    </x-table.header>
</x-layout>
