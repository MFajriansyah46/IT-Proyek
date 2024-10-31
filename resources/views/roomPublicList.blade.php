<x-public-layout>
<!--<h1 class="text-2xl font-bold text-center mt-8">Recomendation</h1>
     <div class="container mx-auto py-8">
        <div class="flex overflow-x-auto space-x-4">
            @foreach ($rooms as $room)
                @if (!isset($room->rent[0]))
                    <div class="min-w-[480px] border rounded-lg bg-gray-50 shadow-lg p-4">
                    </div>
                @endif
            @endforeach
        </div>
    </div> -->


    <h1 class="text-2xl font-bold text-center mt-8">All Room</h1>
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 mx-1 sm:mx-0 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ( $rooms as $room)
                @if (!isset($room->rent[0]))
                    <div class="border rounded-lg bg-gray-50 shadow-lg p-4">
                        <img class="w-full h-60 object-cover rounded-md" src="/storage/{{ $room->gambar_kamar }}" alt="Product Image 1">
                        <h2 class="text-xl font-bold mt-4">{{ $room->building->unit_bangunan }}{{ $room->no_kamar }} - {{ $room->building->alamat_bangunan }}</h2>
                        <div class="flex items-center gap-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 64 64"><path fill="#ffc70f" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2z"/></svg>
                            <small>4.5</small>
                        </div>
                        <p class="text-gray-600 mt-2">Description of the product goes here. Keep it concise and informative.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-semibold">Rp {{ number_format($room->harga_kamar, 2, ',', '.') }} <small>/month</small></span>
                            <a href="rooms-list/detail?r={{ $room->token }}" class="bg-blue-500 text-white hover:bg-blue-600 font-medium px-4 py-2 rounded-md">Detail</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-public-layout>