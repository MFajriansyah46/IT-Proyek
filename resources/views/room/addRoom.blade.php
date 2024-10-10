<x-layout>
    <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-3">Add Rooms</h1>

    <form action="/rooms/submit" method="post" class=" mx-64 flex flex-col">
        @csrf
            <label>No Kamar</label>
            <input type="text" name="no_kamar" class="mb-4">

            <label>Harga Kamar</label>
            <input type="number" name="harga_kamar" class="mb-4">
    
            <label>Internet</label>
            <input type="text" name="kecepatan_internet" class="mb-4">
    
            <label>Rating</label>
            <input type="number" name="rating_kamar" class="mb-4">

        <!-- <label>Konfirmasi password</label>
        <input type="password" name="password_confirm"> -->

        <input type="submit">
    </form>
</x-layout>