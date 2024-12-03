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
                <button type="button" onclick="openModal({{ $rent->id }})" class=" bg-green-600 hover:bg-green-500 font-medium text-white text-sm rounded-lg w-20 text-center cursor-pointer">
                    Send
                </button>

                <!-- Modal -->
                <div id="sendModal{{ $rent->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium text-gray-900">Send Message</h3>
                            <div class="mt-2 mb-4">
                                <p class="text-sm text-gray-600">Tenant: {{ $rent->tenant->name }}</p>
                                <p class="text-sm text-gray-600">Room: {{ $rent->room->building->unit_bangunan }}{{ $rent->room->no_kamar }}</p>
                            </div>
                            <div class="mt-2">
                                <textarea id="message{{ $rent->id }}" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-orange-300" placeholder="Type your message..."></textarea>
                            </div>
                            <div class="flex justify-end gap-4 mt-4">
                                <button onclick="closeModal({{ $rent->id }})" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Cancel</button>
                                <button onclick="sendMessage({{ $rent->id }})" class="px-4 py-2 bg-orange-300 hover:bg-orange-400 rounded-md">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-table.data>
        </tr>
        @endforeach
    </x-table.header>
</x-layout>
