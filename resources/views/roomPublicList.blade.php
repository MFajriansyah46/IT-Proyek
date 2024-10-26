<x-public-layout>
    <h1 class="text-2xl font-bold text-center mt-8">Recomendation</h1>
    <div class="container mx-auto py-8">
        <!-- Mobile: 1 column, sm: 2 columns, lg: 3 columns -->
        <div class="grid grid-cols-1 mx-1 sm:mx-0 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ( $rooms as $room)
                <div class="border rounded-lg bg-gray-50 shadow-lg p-4">
                    <img class="w-full h-60 object-cover rounded-md" src="/storage/{{ $room->gambar_kamar }}" alt="Product Image 1">
                    <h2 class="text-xl font-bold mt-4">{{ $room->building->unit_bangunan }}{{ $room->no_kamar }} - {{ $room->building->alamat_bangunan }}</h2>
                    <small>4.5</small>
                    <p class="text-gray-600 mt-2">Description of the product goes here. Keep it concise and informative.</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xl font-semibold">Rp {{ number_format($room->harga_kamar, 2, ',', '.') }} <small>/month</small></span>
                        <button class="bg-blue-500 text-white hover:bg-blue-600 px-4 py-2 rounded-md">Order</button>
                    </div>
                </div>  
            @endforeach
        </div>
    </div>
</x-public-layout>