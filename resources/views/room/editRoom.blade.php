<x-layout>
    
    <div class="px-8 bg-white shadow-md">
        <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-3">Edit Rooms</h1>
        <form action="/rooms/update/{{ $rooms->id_kamar }}" method="POST" class=" container flex flex-col">
            @csrf
            <label>No Kamar</label>
            <input type="text" name="no_kamar" value="{{ $rooms->no_kamar }}" class="mb-4">
    
            <label>Harga Kamar</label>
            <input type="number" name="harga_kamar" value="{{ $rooms->harga_kamar }}" class="mb-4">
    
            <label>Internet</label>
            <input type="text" name="kecepatan_internet" value="{{ $rooms->kecepatan_internet }}" class="mb-4">
    
            <label>Rating</label>
            <input type="number" name="rating_kamar" value="{{ $rooms->rating_kamar }}" class="mb-4">
    
            <!-- <label>Konfirmasi password</label>
            <input type="password" name="password_confirm"> -->
    
    
            <!-- <button class="mr-auto mb-4 py-2 px-4 rounded-md bg-primary-500">
                <input value="Simpan" type="submit" class="text-white text-lg font-medium">
            </button> -->
        </form>
    </div> 
</x-layout>