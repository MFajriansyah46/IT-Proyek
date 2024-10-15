<x-layout>
    <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-6">Add Rooms</h1>

    <form action="/rooms/submit" method="post" class="mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white shadow-md rounded-lg p-6" onsubmit="return validateForm()">
        @csrf

        <label class="text-lg font-semibold mb-2">No Kamar</label>
        <input type="text" name="no_kamar" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Harga Kamar</label>
        <input type="number" name="harga_kamar" class="border border-gray-300 rounded-md p-2 mb-6" required>
    
        <label class="text-lg font-semibold mb-2">Kecepatan Internet</label>
        <input type="text" name="kecepatan_internet" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <button type="submit" class="mt-4 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">Submit</button>
    </form>
</x-layout>