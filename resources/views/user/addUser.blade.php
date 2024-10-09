<x-layout>
    <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-3">Add Users</h1>

    <form action="/users/submit" method="post" class=" mx-64 flex flex-col">
        @csrf
        <label>Nama</label>
        <input type="text" name="name" class="mb-4">

        <label>Nomor Telepon</label>
        <input type="number" name="phone_number" class="mb-4">

        <label>Username</label>
        <input type="text" name="username" class="mb-4">

        <label>Password</label>
        <input type="password" name="password" class="mb-4">

        <!-- <label>Konfirmasi password</label>
        <input type="password" name="password_confirm"> -->

        <input type="submit">
    </form>
</x-layout>