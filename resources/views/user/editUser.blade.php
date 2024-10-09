<x-layout>
    
    <div class="px-8 bg-white shadow-md">
        <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-3">Edit Users</h1>
        <form action="/users/update/ {{ $users->id }}" class=" container flex flex-col">
            @csrf
            <label>Nama</label>
            <input type="text" name="name" value="{{ $users->name }}" class="mb-4">
    
            <label>Nomor Telepon</label>
            <input type="number" name="phone_number" value="{{ $users->phone_number }}" class="mb-4">
    
            <label>Username</label>
            <input type="text" name="username" value="{{ $users->username }}" class="mb-4">
    
            <label>Password</label>
            <input type="password" name="password" value="{{ $users->password }}" class="mb-4">
    
            <!-- <label>Konfirmasi password</label>
            <input type="password" name="password_confirm"> -->
    
    
            <button class="mr-auto mb-4 py-2 px-4 rounded-md bg-primary-500">
                <input value="Simpan" type="submit" class="text-white text-lg font-medium">
            </button>
        </form>
    </div> 
</x-layout>