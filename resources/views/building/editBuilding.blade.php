<x-layout>
    <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-6">Edit Bangunan</h1>

    <form action="/buildings/{{ $building->id }}/update" method="post" enctype="multipart/form-data" class="mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <label class="text-lg font-semibold mb-2">Unit Bangunan</label>
        <input type="text" name="unit_bangunan" value="{{ $building->unit_bangunan }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Alamat Bangunan</label>
        <input type="text" name="alamat_bangunan" value="{{ $building->alamat_bangunan }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Link Gmap</label>
        <input type="text" name="link_gmap" value="{{ $building->link_gmap }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Gambar Bangunan</label>
        @if($building->gambar_bangunan)
            <img src="{{ asset('images/buildings/' . $building->gambar_bangunan) }}" alt="Gambar Bangunan" class="mb-4 w-40">
        @endif
        <input type="file" name="gambar_bangunan" class="border border-gray-300 rounded-md p-2 mb-6">

        <button type="submit" class="mt-4 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">Update</button>
    </form>
</x-layout>