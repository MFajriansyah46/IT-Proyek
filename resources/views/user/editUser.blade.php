<x-layout>
    
    <div class="px-8 bg-white shadow-md">
        <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-3">Edit Users</h1>
        <form action="/users/update/{{ $users->remember_token }}" class=" container flex flex-col gap-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" required value="{{ $users->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                <div class="mt-2">
                    <input id="phone_number" name="phone_number" type="number" required value="{{ $users->phone_number }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
    
            <div>
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                <div class="mt-2">
                    <input id="username" name="username" type="text" required value="{{ $users->username }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password" required value="{{ $users->password }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
    
            <!-- <label>Konfirmasi password</label>
            <input type="password" name="password_confirm"> -->
    
    
            <button class="mr-auto mb-4 py-2 px-4 rounded-md bg-primary-500">
                <input value="Simpan" type="submit" class="text-white text-lg font-medium">
            </button>
        </form>
    </div> 
</x-layout>