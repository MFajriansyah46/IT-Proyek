<x-layout>
    <div class="px-8 bg-white shadow-md max-w-3xl ml-auto mr-auto mt-4 rounded-md"><br>

        <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-6">Add Rooms</h1>
        <form action="/rooms/submit" method="POST" enctype="multipart/form-data" class="mb-16 mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white rounded-lg p-6" onsubmit="return validateForm()" >
            @csrf
            <h2 class="text-2xl font-medium">Main Information</h2>
            <div class="container mt-5 mb-5">
                <div class="flex justify-center">
                    <label for="upload-room-Image" class="border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer" id="drop-area">
                        <p id="preview-added-room-text" class="text-gray-500 py-24">Click or drag room image here to upload</p>
                        <img id="preview-room-image" src="" alt="" class="hidden w-full h-auto">
                        <input type="file" id="upload-room-Image" name="gambar_kamar" accept="image/*" class="hidden">
                    </label>
                </div>
            </div>

            <label class="text-lg font-semibold mb-2">Room Number</label>
            <input type="number" name="no_kamar" class="border border-gray-300 rounded-md p-2 mb-6" required>

            <label class="text-lg font-semibold mb-2">Building Unit</label>
            <select type="text" name="id_bangunan" class="border border-gray-300 rounded-md p-2 mb-6" required>
                <option></option>
                @foreach(auth()->user()->buildings as $building )
                    <option value="{{ $building->id_bangunan }}">{{ $building->unit_bangunan }} - {{ $building->alamat_bangunan }}</option>
                @endforeach
            </select>
            <label class="text-lg font-semibold mb-2">Price</label>
            <input type="number" name="harga_kamar" class="border border-gray-300 rounded-md p-2 mb-6" required>

            <label class="text-lg font-semibold mb-2">Internet Speed</label>
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

            <h2 class="text-2xl font-medium mt-4 mb-2">Facilities</h2>
            <div class="mb-8">
                <div class="flex gap-12 mb-6">
                    <div class="flex flex-col w-80">
                        <label>Bedroom</label>
                        <select name="bedroom_condition_id" class="border border-gray-300 rounded-md p-2 mt-1 mb-4" required>
                            <option value=""></option>
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        <div class="container mb-5">
                            <div class="flex justify-center">
                                <label for="upload-room-Image1" id="drop-area1" class="border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer">
                                    <p id="preview-added-room-text1" class="text-gray-500 py-8">+</p>
                                    <img id="preview-room-image1" src="" alt="" class="hidden w-full h-auto">
                                    <input type="file" id="upload-room-Image1" name="bedroom_image" accept="image/*" class="hidden">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-80">
                        <label>Bathroom</label>
                        <select name="bathroom_condition_id" class="border border-gray-300 rounded-md p-2 mt-1 mb-4" required>
                            <option value=""></option>
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        <div class="container mb-5">
                            <div class="flex justify-center">
                                <label for="upload-room-Image2" id="drop-area2" class="border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer">
                                    <p id="preview-added-room-text2" class="text-gray-500 py-8">+</p>
                                    <img id="preview-room-image2" src="" alt="" class="hidden w-full h-auto">
                                    <input type="file" id="upload-room-Image2" name="bathroom_image" accept="image/*" class="hidden">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-12">
                    <div class="flex flex-col w-80">
                        <label>Kitchen</label>
                        <select name="kitchen_condition_id" class="border border-gray-300 rounded-md p-2 mt-1 mb-4" required>
                            <option value=""></option>
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        <div class="container mb-5">
                            <div class="flex justify-center">
                                <label for="upload-room-Image3" id="drop-area3" class="border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer">
                                    <p id="preview-added-room-text3" class="text-gray-500 py-8">+</p>
                                    <img id="preview-room-image3" src="" alt="" class="hidden w-full h-auto">
                                    <input type="file" id="upload-room-Image3" name="kitchen_image" accept="image/*" class="hidden">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-80">
                        <label>Security</label>
                        <select name="security_condition_id" class="border border-gray-300 rounded-md p-2 mt-1 mb-4" required>
                            <option value=""></option>
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        <div class="container mb-5">
                            <div class="flex justify-center">
                                <label for="upload-room-Image4" id="drop-area4" class="border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer">
                                    <p id="preview-added-room-text4" class="text-gray-500 py-8">+</p>
                                    <img id="preview-room-image4" src="" alt="" class="hidden w-full h-auto">
                                    <input type="file" id="upload-room-Image4" name="security_image" accept="image/*" class="hidden">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="text-2xl font-medium mb-2">Description</h2>
            <textarea name="deskripsi" id="room-description" class="min-h-32 border border-gray-300 rounded-md p-2 mb-6" placeholder="Enter a more detailed description of this room"></textarea>
            <button type="submit" class="mt-4 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">Save</button>
        </form>
    </div>
</x-layout>
