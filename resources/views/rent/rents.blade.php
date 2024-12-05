<x-layout>

    <h1 class="my-8 text-5xl font-bold text-gray-800">Active Rentals</h1>

    <x-table.header :headers="['Tenant', 'Room', 'Ends At','','']">
        @foreach ($rents as $i=>$rent)
        <tr>
            <x-table.data class="text-center">{{ $i + 1 }}</x-table.data>
            <x-table.data>{{ $rent->tenant->name }}</x-table.data>
            <x-table.data>{{ $rent->room->building->unit_bangunan }}{{ $rent->room->no_kamar }} - {{ $rent->room->building->alamat_bangunan }}</x-table.data>
            <x-table.data>
                <span id="countdown{{ $rent->id }}"></span>
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
                            $('#countdown{{ $rent->id }}').text(`${days}d ${hours}h ${minutes}m ${seconds}s`);

                            // Jika hitungan mundur selesai
                            if (distance < 0) {
                                clearInterval(countdownInterval);
                                $('#countdown{{ $rent->id }}').text("Expired");
                            }
                        }, 1000);
                    });
                </script>
            </x-table.data>
            <x-table.data>
                <form action="/discard/{{ $rent->token }}" class="rent-discard-form" id="form-delete-{{ $rent->id }}" data-rent-id="{{ $rent->id }}">
                    @csrf
                    <button type="button" class="discard-rent-button" data-room-id="{{ $rent->id }}">
                        <div class=" bg-red-600 hover:bg-red-500 font-medium text-white text-sm rounded-lg w-20 text-center cursor-pointer">Discard</div>
                    </button>
                </form>
            </x-table.data>
            <x-table.data>
                <button type="button" onclick="openModal('{{ $rent->id }}')" class=" bg-green-600 hover:bg-green-500 font-medium text-white text-sm rounded-lg w-20 text-center cursor-pointer">
                    Massage
                </button>

                <!-- Modal -->
                <div id="sendModal-{{ $rent->id }}" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50 backdrop-blur-sm">
                    <div class="relative top-20 mx-auto w-100 shadow-lg rounded-3xl bg-white">
                        <div class="flex justify-between bg-gradient-to-r from-green-600 to-green-500 p-4 rounded-t-2xl">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M2 22L3.41152 16.8691C2.54422 15.3639 2.08876 13.6568 2.09099 11.9196C2.08095 6.44549 6.52644 2 11.99 2C14.6417 2 17.1315 3.02806 19.0062 4.9034C19.9303 5.82266 20.6627 6.91616 21.1611 8.12054C21.6595 9.32492 21.9139 10.6162 21.9096 11.9196C21.9096 17.3832 17.4641 21.8287 12 21.8287C10.3368 21.8287 8.71374 21.4151 7.26204 20.6192L2 22ZM7.49424 18.8349L7.79675 19.0162C9.06649 19.7676 10.5146 20.1644 11.99 20.1654C16.5264 20.1654 20.2263 16.4662 20.2263 11.9291C20.2263 9.73176 19.3696 7.65554 17.8168 6.1034C17.0533 5.33553 16.1453 4.72636 15.1453 4.31101C14.1452 3.89565 13.0728 3.68232 11.99 3.68331C7.44343 3.6839 3.74476 7.38316 3.74476 11.9202C3.74476 13.4724 4.17843 14.995 5.00502 16.3055L5.19645 16.618L4.35982 19.662L7.49483 18.8354L7.49424 18.8349Z" fill="#00b14f"></path> <!-- Ganti warna fill -->
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.52024 7.76662C9.33885 7.35303 9.13737 7.34298 8.96603 7.34298C8.81477 7.33294 8.65288 7.33294 8.48154 7.33294C8.32083 7.33294 8.04845 7.39321 7.81684 7.64549C7.58464 7.89719 6.95007 8.49217 6.95007 9.71167C6.95007 10.9318 7.83693 12.1111 7.95805 12.2724C8.07858 12.4337 9.67149 15.0139 12.192 16.0124C14.2883 16.839 14.712 16.6777 15.1657 16.6269C15.6189 16.5767 16.6275 16.0325 16.839 15.4476C17.0405 14.8733 17.0405 14.3693 16.9802 14.2682C16.9199 14.1678 16.748 14.1069 16.5064 13.9758C16.2541 13.8552 15.0446 13.2502 14.813 13.1693C14.5808 13.0889 14.4195 13.0487 14.2582 13.2904C14.0969 13.5427 13.623 14.0969 13.4724 14.2582C13.3306 14.4195 13.1799 14.4396 12.9377 14.3185C12.686 14.1979 11.8895 13.9356 10.9418 13.0889C10.2056 12.4331 9.71167 11.6171 9.56041 11.3755C9.41979 11.1232 9.54032 10.992 9.67149 10.8709C9.78257 10.7604 9.92378 10.579 10.0449 10.4378C10.1654 10.296 10.2056 10.1855 10.2966 10.0242C10.377 9.86292 10.3368 9.71167 10.2765 9.59114C10.2157 9.48006 9.74239 8.25997 9.52024 7.76603V7.76662Z" fill="#00b14f"></path> <!-- Ganti warna fill -->
                                        </g>
                                    </svg>
                                </div>
                                <div class="leading-none">
                                    <p class="text-lg font-bold px-2 text-[#f5f5f5]">Message Center</p>
                                    <p class="px-2 text-[12px] text-[#f5f5f5]">Kos Bang Raja</p>
                                </div>
                            </div>
                            <button type="button" onclick="closeModal('{{ $rent->id }}')" class="p-1 m-2 hover:bg-green-200 rounded flex items-center justify-center transition-all duration-200">
                                <div class="icon-container text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                    </div>
                        <div class="p-5">
                            <p class="text-sm text-gray-900">Name: {{ $rent->tenant->name }}</p>
                            <p class="text-sm text-gray-900">Room: {{ $rent->room->building->unit_bangunan }}{{ $rent->room->no_kamar }} - {{ $rent->room->building->alamat_bangunan }}</p>
                            <form id="messageForm-{{ $rent->id }}" class="mt-4" onsubmit="sendMessage(event, '{{ $rent->id }}')">
                                <div class="mb-3">
                                    <label for="phone" class="block text-sm text-gray-600">Phone Number</label>
                                    <input type="tel" id="phone" class="w-full px-2 py-1 border rounded-lg focus:ring-1 focus:ring-green-500 focus:border-green-400" placeholder="Example: 628***********" value="{{ old('phone', $rent->tenant->phone_number) }}" required>
                                </div>
                                <div class="mb-3">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="block text-sm text-gray-600">Message</label>
                                    <textarea id="message" rows="4" class="w-full px-2 py-2 border rounded-lg focus:ring-1 focus:ring-green-500 focus:border-green-400" placeholder="Type your message here..." required></textarea>
                                </div>
                                <div class="flex gap-2 mb-2">
                                    <button type="button"
                                            onclick="setTemplate('thanks', '{{ $rent->id }}')"
                                            class="flex-1 px-3 py-1 text-sm bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200">
                                        🙏 Terima Kasih
                                    </button>
                                    <button type="button"
                                            onclick="setTemplate('reminder', '{{ $rent->id }}')"
                                            class="flex-1 px-3 py-1 text-sm bg-yellow-100 hover:bg-yellow-200 rounded-lg transition-colors duration-200">
                                        ⏰ Pengingat
                                    </button>
                                </div>
                                <div class="flex justify-end gap-4 mt-4">
                                    <button type="submit" class="p-2 w-full bg-green-500 hover:bg-green-600 rounded-md flex items-center justify-center gap-2">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#f5f5f5">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M10.3009 13.6949L20.102 3.89742M10.5795 14.1355L12.8019 18.5804C13.339 19.6545 13.6075 20.1916 13.9458 20.3356C14.2394 20.4606 14.575 20.4379 14.8492 20.2747C15.1651 20.0866 15.3591 19.5183 15.7472 18.3818L19.9463 6.08434C20.2845 5.09409 20.4535 4.59896 20.3378 4.27142C20.2371 3.98648 20.013 3.76234 19.7281 3.66167C19.4005 3.54595 18.9054 3.71502 17.9151 4.05315L5.61763 8.2523C4.48114 8.64037 3.91289 8.83441 3.72478 9.15032C3.56153 9.42447 3.53891 9.76007 3.66389 10.0536C3.80791 10.3919 4.34498 10.6605 5.41912 11.1975L9.86397 13.42C10.041 13.5085 10.1295 13.5527 10.2061 13.6118C10.2742 13.6643 10.3352 13.7253 10.3876 13.7933C10.4468 13.87 10.491 13.9585 10.5795 14.1355Z" stroke="#f2f2f2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        <span class="text-[#f5f5f5]">Send</span>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="alert-container" class="fixed top-4 right-4 z-50"></div>
            </x-table.data>
        </tr>
        @endforeach
    </x-table.header>
</x-layout>
