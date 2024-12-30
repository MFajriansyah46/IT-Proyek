<x-layout>
    <div class="px-8 bg-white shadow-md max-w-3xl ml-auto mr-auto mt-4 rounded-md"><br>

        <h1 class="text-5xl font-bold text-center text-gray-800 mt-4">Edit Room</h1>
        <form action="/rooms/update/" id="form-edit-room" method="post" class="mb-20 mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white rounded-lg p-6" enctype="multipart/form-data">
            @csrf
            <h2 class="text-2xl font-medium">Main Information</h2>
            <input type="hidden" name="remember_token" value="{{$room->remember_token}}">
            <div class="container mt-5 mb-5">
                <div class="flex justify-center">
                    <label for="upload-room-Image" class="p-1 border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer" id="drop-area">
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

            <h2 class="text-2xl font-medium mt-4 mb-2">Facilities</h2>
            <div class="mb-8">
                <div class="flex gap-12 mb-6">
                    <div class="flex flex-col w-80">
                        <label>Bedroom</label>
                        <select name="bedroom_condition_id" class="border border-gray-300 rounded-md p-2 mt-1 mb-4" required>
                            @if(isset($bedroom))
                                <option value="{{ $bedroom->condition->id }}">{{ $bedroom->condition->name }}</option>
                            @else
                                <option value=""></option>
                            @endif
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        <div class="container mb-5">
                            <div class="flex justify-center">
                                <label for="upload-room-Image1" id="drop-area1" class="p-1 border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer">
                                    @if(isset($bedroom))
                                        @if($bedroom->image)
                                            <img id="preview-room-image1" src="{{ asset('/storage/' . $bedroom->image) }}" alt="" class="w-full h-auto">
                                        @else
                                            <p id="preview-added-room-text1" class="text-gray-500 py-8">+</p>
                                            <img id="preview-room-image1" src="" alt="Gambar Kamar" class="hidden w-full h-auto">
                                        @endif
                                    @else
                                        <p id="preview-added-room-text1" class="text-gray-500 py-8">+</p>
                                        <img id="preview-room-image1" src="" alt="Gambar Kamar" class="hidden w-full h-auto">
                                    @endif
                                    <input type="file" id="upload-room-Image1" name="bedroom_image" accept="image/*" class="hidden" onchange="previewImage(event)">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-80">
                        <label>Bathroom</label>
                        <select name="bathroom_condition_id" class="border border-gray-300 rounded-md p-2 mt-1 mb-4" required>
                            @if(isset($bathroom))
                                <option value="{{ $bathroom->condition->id }}">{{ $bathroom->condition->name }}</option>
                            @else
                                <option value=""></option>
                            @endif
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        <div class="container mb-5">
                            <div class="flex justify-center">
                                <label for="upload-room-Image2" id="drop-area2" class="p-1 border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer">
                                    @if(isset($bathroom))
                                        @if($bathroom->image)
                                            <img id="preview-room-image2" src="{{ asset('/storage/' . $bathroom->image) }}" alt="" class="w-full h-auto">
                                        @else
                                            <p id="preview-added-room-text2" class="text-gray-500 py-8">+</p>
                                            <img id="preview-room-image2" src="" alt="bathroom" class="hidden w-full h-auto">
                                        @endif
                                    @else
                                        <p id="preview-added-room-text2" class="text-gray-500 py-8">+</p>
                                        <img id="preview-room-image2" src="" alt="bathroom" class="hidden w-full h-auto">
                                    @endif
                                    <input type="file" id="upload-room-Image2" name="bathroom_image" accept="image/*" class="hidden" onchange="previewImage(event)">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-12">
                    <div class="flex flex-col w-80">
                        <label>Kitchen</label>
                        <select name="kitchen_condition_id" class="border border-gray-300 rounded-md p-2 mt-1 mb-4" required>
                            @if(isset($kitchen))
                                <option value="{{ $kitchen->condition->id }}">{{ $kitchen->condition->name }}</option>
                            @else
                                <option value=""></option>
                            @endif
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        <div class="container mb-5">
                            <div class="flex justify-center">
                                <label for="upload-room-Image3" id="drop-area3" class="p-1 border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer">
                                    @if(isset($kitchen))
                                        @if($kitchen->image)
                                            <img id="preview-room-image3" src="{{ asset('/storage/' . $kitchen->image) }}" alt="" class="w-full h-auto">
                                        @else
                                            <p id="preview-added-room-text3" class="text-gray-500 py-8">+</p>
                                            <img id="preview-room-image3" src="" alt="kitchen" class="hidden w-full h-auto">
                                        @endif
                                    @else
                                        <p id="preview-added-room-text3" class="text-gray-500 py-8">+</p>
                                        <img id="preview-room-image3" src="" alt="kitchen" class="hidden w-full h-auto">
                                    @endif
                                    <input type="file" id="upload-room-Image3" name="kitchen_image" accept="image/*" class="hidden" onchange="previewImage(event)">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-80">
                        <label>Security</label>
                        <select name="security_condition_id" class="border border-gray-300 rounded-md p-2 mt-1 mb-4" required>
                            @if(isset($security))
                                <option value="{{ $security->condition->id }}">{{ $security->condition->name }}</option>
                            @else
                                <option value=""></option>
                            @endif
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        <div class="container mb-5">
                            <div class="flex justify-center">
                                <label for="upload-room-Image4" id="drop-area4" class="p-1 border-2 border-dashed border-gray-300 w-full max-w-lg text-center cursor-pointer">
                                    @if(isset($security))
                                        @if($security->image)
                                            <img id="preview-room-image4" src="{{ asset('/storage/' . $security->image) }}" alt="" class="w-full h-auto">
                                        @else
                                            <p id="preview-added-room-text4" class="text-gray-500 py-8">+</p>
                                            <img id="preview-room-image4" src="" alt="kitchen" class="hidden w-full h-auto">
                                        @endif
                                    @else
                                        <p id="preview-added-room-text4" class="text-gray-500 py-8">+</p>
                                        <img id="preview-room-image4" src="" alt="kitchen" class="hidden w-full h-auto">
                                    @endif
                                    <input type="file" id="upload-room-Image4" name="security_image" accept="image/*" class="hidden" onchange="previewImage(event)">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="text-2xl font-medium mb-2">Description</h2>
            <textarea name="deskripsi" id="room-description" class="min-h-32 border border-gray-300 rounded-md p-2 mb-6" placeholder="Enter a more detailed description of this room">{{ $room->deskripsi }}</textarea>
            <button type="button" id="edit-room-button" class="mt-4 bg-primary-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-primary-400 focus:outline-none">Save</button>
        </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</x-layout>
