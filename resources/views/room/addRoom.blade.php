<x-layout>

    <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-6">Add Rooms</h1>
    <form action="/rooms/submit" method="post" class="mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white shadow-md rounded-lg p-6" onsubmit="return validateForm()" enctype="multipart/form-data">
        @csrf

        <label class="text-lg font-semibold mb-2">No Kamar</label>
        <input type="number" name="no_kamar" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <input type="hidden" name="owner_id" value="{{ auth('owner')->user()->id }}">

        <!-- <div class="container mt-10">
            <div class="flex justify-center">
                <label for="upload-room-Image" class="border-2 border-dashed border-gray-300 p-10 w-full max-w-lg text-center cursor-pointer" id="drop-area">
                    <p id="preview-added-room-text" class="text-gray-500 py-12">Click or drag building image here to upload</p>
                    <img id="preview-room-image" src="" alt="" class="hidden w-full h-auto">
                    <input type="file" id="upload-room-Image" name="gambar_bangunan" accept="image/*" class="hidden">
                </label>
            </div>
        </div> -->

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

        <label class="text-lg font-semibold mb-2">Gambar Kamar</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="file" name="gambar_kamar" accept="image/png, image/jpeg" required>
        <div class="mt-1 mb-6 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Gambar kamar dalam format PNG, JPG, atau JPEG.</div>

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
</x-layout>
