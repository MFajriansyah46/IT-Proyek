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
                <button type="button" onclick="openModal()" class=" bg-green-600 hover:bg-green-500 font-medium text-white text-sm rounded-lg w-20 text-center cursor-pointer">
                    Send
                </button>

                <!-- Modal -->
                <div id="sendModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold">Send Message</h3>
                            <button type="button" onclick="closeModal()" class=" hover:bg-gray-100 rounded-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            </div>
                            <span id="tenant-name" data-name="{{ $rent->tenant->name }}"></span>
                            <p class="text-sm text-gray-900">Name: {{ $rent->tenant->name }}</p>
                            <p class="text-sm text-gray-900">Room: {{ $rent->room->building->unit_bangunan }}{{ $rent->room->no_kamar }} - {{ $rent->room->building->alamat_bangunan }}</p>
                            <form id="messageForm" class="mt-4">
                                <div class="mb-3">
                                    <label for="phone" class="block text-sm text-gray-600">Phone Number</label>
                                    <input type="tel" id="phone" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-orange-300" value="{{ $rent->tenant->phone_number }}" required>
                                </div>
                                <div class="mb-3">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="block text-sm text-gray-600">Message</label>
                                    <textarea id="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-orange-300" placeholder="Type your message here..." required></textarea>
                                </div>
                                <div class="flex gap-2 mb-2">
                                    <button type="button"
                                            onclick="setTemplate('thanks')"
                                            class="flex-1 px-3 py-2 text-sm bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200">
                                        🙏 Terima Kasih
                                    </button>
                                    <button type="button"
                                            onclick="setTemplate('reminder')"
                                            class="flex-1 px-3 py-2 text-sm bg-yellow-100 hover:bg-yellow-200 rounded-lg transition-colors duration-200">
                                        ⏰ Pengingat
                                    </button>
                                </div>
                                <div class="flex justify-end gap-4 mt-4">
                                    <button type="submit" class="px-4 py-2 bg-orange-300 hover:bg-orange-400 rounded-md">Send</button>
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
