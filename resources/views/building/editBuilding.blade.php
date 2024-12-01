<x-layout>
    
<div class="px-8 bg-white shadow-md max-w-3xl ml-auto mr-auto mt-4 mb-20 rounded-md"><br>
<h1 class="text-5xl font-bold text-center text-gray-800">Edit Building</h1>
    <form action="/buildings/update/" method="post" id="building-edit-form" enctype="multipart/form-data" class="mx-auto max-w-xl sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white rounded-lg p-6">
        @csrf
        <input type="hidden" name="remember_token" value="{{ $building->remember_token }}">
        <div class="container mt-10">
            <div class="flex justify-center">
                <label for="update-building-Image" class="border-2 border-dashed border-gray-300 p-10 w-full max-w-lg text-center cursor-pointer" id="drop-area">
                    @if($building->gambar_bangunan)
                        <img id="preview-added-building-image" src="/storage/{{ $building->gambar_bangunan }}" alt="" class="w-full h-auto">
                    @else
                        <img id="preview-added-building-image" src="/storage/{{ $building->gambar_bangunan }}" alt="" class="w-full h-auto">
                        <p id="preview-added-building-text" class="text-gray-500 py-12">Click or drag building image here to upload</p>
                    @endif
                    <input type="file" id="update-building-Image" name="gambar_bangunan" accept="image/*" class="hidden">
                </label>
            </div>
        </div>
        <br>
        <label class="text-lg font-semibold mb-2">Unit Bangunan</label>
        <input type="text" name="unit_bangunan" value="{{ $building->unit_bangunan }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Alamat Bangunan</label>
        <input type="text" name="alamat_bangunan" value="{{ $building->alamat_bangunan }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Link Gmap</label>
        <input type="text" name="link_gmap" value="{{ $building->link_gmap }}" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <button type="button" id="edit-building-button" class="mt-4 bg-primary-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-primary-400 focus:outline-none">Save</button>
    </form>
</div>
</x-layout>