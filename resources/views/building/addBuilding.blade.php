<x-layout>
    <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-6">Tambah Bangunan</h1>

    <form action="/buildings/submit" method="post" enctype="multipart/form-data" class="mx-auto max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl flex flex-col bg-white shadow-md rounded-lg p-6" onsubmit="return validateForm()">
        @csrf
        <div class="container mt-10">
            <div class="flex justify-center">
                <label for="upload-building-Image"
                    class="border-2 border-dashed border-gray-300 p-10 w-full max-w-lg text-center cursor-pointer">
                    <div id="preview-text" class="text-gray-500">Click or drag building image here to upload</div>
                    <img id="preview-image" src="" alt="" class="hidden w-full h-auto">
                    <input type="file" id="upload-building-Image" name="image" accept="image/*"
                        class="hidden">
                </label>
            </div>
        </div>

        <label class="text-lg font-semibold mb-2">Unit Bangunan</label>
        <input type="text" name="unit_bangunan" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Alamat Bangunan</label>
        <input type="text" name="alamat_bangunan" class="border border-gray-300 rounded-md p-2 mb-6" required>

        <label class="text-lg font-semibold mb-2">Link Gmap</label>
        <input type="text" name="link_gmap" class="border border-gray-300 rounded-md p-2 mb-6" required>
{{-- 
        <label class="text-lg font-semibold mb-2">Gambar Bangunan</label>
        <input type="file" name="gambar_bangunan" class="border border-gray-300 rounded-md p-2 mb-6"> --}}

        <button type="submit" class="mt-4 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">Submit</button>
    </form>
</x-layout>
