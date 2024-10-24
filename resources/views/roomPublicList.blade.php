<x-public-layout>
    <h1 class="text-2xl font-bold text-center mt-8">Recomendation</h1>
    <div class="container mx-auto py-8">
        <!-- Mobile: 1 column, sm: 2 columns, lg: 3 columns -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Product Card 1 -->

            @foreach ( $rooms as $room)
                <div class="border rounded-lg shadow-lg p-4">
                    <img class="w-full h-48 object-cover rounded-md" src="/storage/{{ $room->gambar_kamar }}" alt="Product Image 1">
                    <h2 class="text-xl font-bold mt-4">{{ $room->building->unit_bangunan }}{{ $room->no_kamar }} - {{ $room->building->alamat_bangunan }}</h2>
                    <p class="text-gray-600 mt-2">Description of the product goes here. Keep it concise and informative.</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-lg font-semibold">Rp 425.000,00</span>
                        <button class="bg-blue-500 text-white hover:bg-blue-600 px-4 py-2 rounded-md">Order</button>
                    </div>
                </div>
            @endforeach

            <!-- Product Card 2 -->
            <div class="border rounded-lg shadow-lg p-4">
                <img class="w-full h-48 object-cover rounded-md" src="https://via.placeholder.com/150"
                    alt="Product Image 2">
                <h2 class="text-xl font-bold mt-4">Product Title 2</h2>
                <p class="text-gray-600 mt-2">Description of the product goes here. Keep it concise and informative.</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-lg font-semibold">Rp 425.000,00</span>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Order</button>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="border rounded-lg shadow-lg p-4">
                <img class="w-full h-48 object-cover rounded-md" src="https://via.placeholder.com/150"
                    alt="Product Image 3">
                <h2 class="text-xl font-bold mt-4">Product Title 3</h2>
                <p class="text-gray-600 mt-2">Description of the product goes here. Keep it concise and informative.</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-lg font-semibold">Rp 425.000,00</span>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Order</button>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="border rounded-lg shadow-lg p-4">
                <img class="w-full h-48 object-cover rounded-md" src="https://via.placeholder.com/150"
                    alt="Product Image 4">
                <h2 class="text-xl font-bold mt-4">Product Title 4</h2>
                <p class="text-gray-600 mt-2">Description of the product goes here. Keep it concise and informative.</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-lg font-semibold">Rp 425.000,00</span>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Order</button>
                </div>
            </div>

            <!-- Product Card 5 -->
            <div class="border rounded-lg shadow-lg p-4">
                <img class="w-full h-48 object-cover rounded-md" src="https://via.placeholder.com/150"
                    alt="Product Image 5">
                <h2 class="text-xl font-bold mt-4">Product Title 5</h2>
                <p class="text-gray-600 mt-2">Description of the product goes here. Keep it concise and informative.</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-lg font-semibold">Rp 425.000,00</span>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Order</button>
                </div>
            </div>

            <!-- Product Card 6 -->
            <div class="border rounded-lg shadow-lg p-4">
                <img class="w-full h-48 object-cover rounded-md" src="https://via.placeholder.com/150"
                    alt="Product Image 6">
                <h2 class="text-xl font-bold mt-4">Product Title 6</h2>
                <p class="text-gray-600 mt-2">Description of the product goes here. Keep it concise and informative.</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-lg font-semibold">Rp 425.000,00</span>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Order</button>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>