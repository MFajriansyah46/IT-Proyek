<x-layout>
    
    <div class="bg-white mt-8 py-8 shadow-md">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-3">Add new user</h1>
        <form action="/users/submit" method="post" class=" mx-64 flex flex-col gap-4">
            @csrf
            <div>
              <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
              <div class="mt-2">
                <input id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
    
            <div>
              <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Nomor Telepon</label>
              <div class="mt-2">
                <input id="phone_number" name="phone_number" type="number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
    
            <div>
              <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
              <div class="mt-2">
                <input id="username" name="username" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
    
            <div>
              <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div class="mt-2">
                <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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