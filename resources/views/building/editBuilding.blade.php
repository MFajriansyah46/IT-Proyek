<x-layout>
    <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-6">Edit Buildings</h1>

    <form action="/buildings/update/{{ $building->id_bangunan }}" method="POST" class="mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white shadow-md rounded-lg p-6" onsubmit="return validateForm()">
        @csrf
        <label class="text-lg font-semibold mb-2">Unit</label>
        <input type="text" name="unit" value="{{ $building->unit }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Address</label>
        <input type="text" name="address" value="{{ $building->address }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Latitude</label>
        <input type="text" name="latitude" value="{{ $building->latitude }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Longitude</label>
        <input type="text" name="longitude" value="{{ $building->longitude }}" class="border border-gray-300 rounded-md p-2 mb-4" required>

        <button type="submit" class="mt-4 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">Simpan</button>
    </form>
</x-layout>