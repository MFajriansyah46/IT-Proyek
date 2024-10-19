<x-layout>
    
<div class="px-8 bg-white shadow-md max-w-3xl ml-auto mr-auto mt-4 rounded-md"><br>
    <h1 class="text-5xl font-bold text-center text-gray-800">Add Building</h1>
    <form action="/buildings/submit" method="post" class="mb-20 mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white shadow-md rounded-lg p-6" onsubmit="return validateForm()"  enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="owner_id" value="{{ auth('owner')->user()->id }}">

        <div class="container mt-10">
            <div class="flex justify-center">
                <label for="upload-building-Image" class="border-2 border-dashed border-gray-300 p-10 w-full max-w-lg text-center cursor-pointer" id="drop-area">
                    <p id="preview-added-building-text" class="text-gray-500 py-12">Click or drag building image here to upload</p>
                    <img id="preview-building-image" src="" alt="" class="hidden w-full h-auto">
                    <input type="file" id="upload-building-Image" name="gambar_bangunan" accept="image/*" class="hidden">
                </label>
            </div>
        </div>

        <label class="text-lg font-semibold mb-2">Unit</label>
        <input type="text" name="unit_bangunan" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Alamat Bangunan</label>
        <input type="text" name="alamat_bangunan" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Gmap Link</label>
        <input type="text" name="link_gmap" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Description</label>
        <textarea type="text" name="description" class="border border-gray-300 rounded-md p-2 mb-6" required></textarea>

        <button type="submit" class="mt-4 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">Submit</button>
    </form>
</div>
</x-layout>
