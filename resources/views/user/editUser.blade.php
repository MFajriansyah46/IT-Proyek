<x-layout>

    <div class="px-8 bg-white shadow-md max-w-lg ml-auto mr-auto mt-4"><br>
        <h1 class="text-5xl font-bold text-center text-gray-800 mb-8">Edit Users</h1>
        <form method="post" action="/users/update/" enctype="multipart/form-data" class="container flex flex-col gap-4">
            @csrf

            <input type="hidden" name="remember_token" value="{{ $users->remember_token }}">

            <div class="flex flex-col items-center justify-center">
                <div class="relative">
                    <img class="w-32 h-32 rounded-full border object-cover" id="profileImage" src="/storage/{{ $users->image }}" alt=".">
                    <label
                        class="absolute bottom-0 right-0 bg-blue-500 text-white p-2 rounded-full cursor-pointer hover:bg-blue-600">
                        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 3.55A1.13 1.13 0 0 1 18 4.67v10.67a1.13 1.13 0 0 1-1.13 1.12H3.13A1.13 1.13 0 0 1 2 15.34V4.67a1.13 1.13 0 0 1 1.13-1.12h2.1L6.5 2.9a1.13 1.13 0 0 1 .8-.33h5.41c.31 0 .59.12.8.33l1.27 1.45h2.1zM10 6.67a1.13 1.13 0 1 0 0 2.27 1.13 1.13 0 0 0 0-2.27zm3.33 6.67H6.67a.67.67 0 0 0 0 1.34h6.66a.67.67 0 0 0 0-1.34z" />
                        </svg>
                        <input name="image" type="file" class="hidden" accept="image/*" id="fileInput">
                    </label>
                </div>
            </div>

            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" required value="{{ $users->name }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="flex gap-4">
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" required value="{{ $users->username }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Phone
                        Number</label>
                    <div class="mt-2">
                        <input id="phone_number" name="phone_number" type="number" required
                            value="{{ $users->phone_number }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>

            <div>
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password" required value="{{ $users->password }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <button type="submit"
                class="mr-auto mb-4 py-2 px-4 rounded-md text-white text-lg font-medium bg-primary-500 hover:bg-primary-400">Save</button>
        </form>
    </div>
</x-layout>