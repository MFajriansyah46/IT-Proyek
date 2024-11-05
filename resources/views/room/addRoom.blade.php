<x-layout>
    <div class="px-8 bg-white shadow-md max-w-3xl ml-auto mr-auto mt-4 rounded-md"><br>

        <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-6">Add Rooms</h1>
        <form action="/rooms/submit" method="POST" enctype="multipart/form-data" class="mb-16 mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white shadow-md rounded-lg p-6" onsubmit="return validateForm()" >
            @csrf

            <div class="container mt-5 mb-5">
                <div class="flex justify-center">
                    <label for="upload-room-Image" class="border-2 border-dashed border-gray-300 p-10 w-full max-w-lg text-center cursor-pointer" id="drop-area">
                        <p id="preview-added-room-text" class="text-gray-500 py-12">Click or drag room image here to upload</p>
                        <img id="preview-room-image" src="" alt="" class="hidden w-full h-auto">
                        <input type="file" id="upload-room-Image" name="gambar_kamar" accept="image/*" class="hidden">
                    </label>
                </div>
            </div>

            <label class="text-lg font-semibold mb-2">No Kamar</label>
            <input type="number" name="no_kamar" class="border border-gray-300 rounded-md p-2 mb-6" required>

            <label class="text-lg font-semibold mb-2">Unit Bangunan</label>
            <select type="text" name="id_bangunan" class="border border-gray-300 rounded-md p-2 mb-6" required>
                <option></option>
                @foreach(auth()->user()->buildings as $building )
                    <option value="{{ $building->id_bangunan }}">{{ $building->unit_bangunan }} - {{ $building->alamat_bangunan }}</option>
                @endforeach
            </select>
            <label class="text-lg font-semibold mb-2">Harga Kamar</label>
            <input type="number" name="harga_kamar" class="border border-gray-300 rounded-md p-2 mb-6" required>

            <label class="text-lg font-semibold mb-2">Kecepatan Internet</label>
            <input type="text" name="kecepatan_internet" class="border border-gray-300 rounded-md p-2 mb-6" required>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="mt-4 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">Submit</button>
        </form>
    </div>
</x-layout>
