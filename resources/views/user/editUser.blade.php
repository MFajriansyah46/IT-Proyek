<x-layout>
    
    <div class="px-8 bg-white shadow-md">
        <h1 class="text-5xl font-bold text-center text-gray-800 mt-8 mb-3">Edit Users</h1>
        <form method="post" action="/users/update/" enctype="multipart/form-data" class="container flex flex-col gap-4">
            @csrf

            <input type="hidden" name="remember_token" value="{{ $users->remember_token }}">

            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" required value="{{ $users->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="flex gap-8">
                <div>
                    <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                    <div class="mt-2">
                        <input id="phone_number" name="phone_number" type="number" required value="{{ $users->phone_number }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
    
                <div class="mt-auto">
                    <input id="image" name="image" type="file">
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
    
            <button type="submit" class="mr-auto mb-4 py-2 px-4 rounded-md text-white text-lg font-medium bg-primary-500 hover:bg-primary-400">Simpan</button>
        </form>
    </div> 
</x-layout>