<x-layout>

    <h1 class="my-8 text-5xl font-bold text-gray-800">Active Rentals</h1>

    <x-table.header :headers="['Tenant', 'Room', 'Ends At','']">
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
        </tr>
        @endforeach
    </x-table.header>
</x-layout>