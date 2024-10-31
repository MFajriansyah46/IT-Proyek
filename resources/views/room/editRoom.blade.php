<x-layout>
    <div class="px-8 bg-white shadow-md max-w-3xl ml-auto mr-auto mt-4 rounded-md"><br>

        <h1 class="text-5xl font-bold text-center text-gray-800 mt-4">Edit Room</h1>
        <form action="/rooms/update/{{ $room->id_kamar }}" id="form-edit-room" method="post" class="mb-20 mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white shadow-md rounded-lg p-6" enctype="multipart/form-data">
            @csrf
            <div class="container mt-5 mb-5">
                <div class="flex justify-center">
                    <label for="upload-room-Image" class="border-2 border-dashed border-gray-300 p-10 w-full max-w-lg text-center cursor-pointer" id="drop-area">
                        @if($room->gambar_kamar)
                            <img id="preview-room-image" src="{{ asset('/storage/' . $room->gambar_kamar) }}" alt="Gambar Kamar" class="w-full h-auto">
                        @else
                            <p id="preview-added-room-text" class="text-gray-500 py-12">Click or drag room image here to upload</p>
                            <img id="preview-room-image" src="#" alt="Gambar Kamar" class="hidden w-full h-auto">
                        @endif
                        <input type="file" id="upload-room-Image" name="gambar_kamar" accept="image/*" class="hidden" onchange="previewImage(event)">
                    </label>
                </div>
            </div>


            <label class="text-lg font-semibold mb-2">No Kamar</label>
            <input type="number" name="no_kamar" value="{{ $room->no_kamar }}" class="border border-gray-300 rounded-md p-2 mb-6" required>
            
            <label class="text-lg font-semibold mb-2">Unit Bangunan</label>
            <select name="id_bangunan" id="" class="border border-gray-300 rounded-md p-2 mb-6" required>
                {{ $select = $room->building->id_bangunan }}
                <option value="{{ $room->building->id_bangunan }}"> {{ $room->building->unit_bangunan }} - {{ $room->building->alamat_bangunan }} </option>
                @foreach ( auth()->user()->buildings as $building )
                    @if ($building->id_bangunan != $select )
                        <option value="{{ $building->id_bangunan }}">{{ $building->unit_bangunan }} - {{ $building->alamat_bangunan }}</option>
                    @endif
                @endforeach
            </select>

            <label class="text-lg font-semibold mb-2">Harga Kamar</label>
            <input type="number" name="harga_kamar" class="border border-gray-300 rounded-md p-2 mb-6" value="{{ old('harga_kamar', $room->harga_kamar) }}" required>

            <label class="text-lg font-semibold mb-2">Kecepatan Internet</label>
            <input type="text" name="kecepatan_internet" class="border border-gray-300 rounded-md p-2 mb-6" value="{{ old('kecepatan_internet', $room->kecepatan_internet) }}" required>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="button" id="edit-room-button" class="mt-4 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">Update</button>

        </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>

</x-layout>
