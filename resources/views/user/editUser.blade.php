<x-layout>

    <div class="px-8 bg-white shadow-md max-w-lg ml-auto mr-auto mt-4 mb-20"><br>
        <h1 class="text-5xl font-bold text-center text-gray-800 mb-8">Edit Users</h1>
        <form method="post" action="/users/update/" id="user-edit-form" enctype="multipart/form-data" class="container flex flex-col gap-4">
            @csrf
            <input type="hidden" name="remember_token" value="{{ $users->remember_token }}">

            <div class="flex flex-col items-center justify-center">
                <div class="relative">
                    <img class="w-32 h-32 rounded-full border object-cover" id="profileImage"
                        src="/storage/{{ $users->image }}" alt=".">
                    <label
                        class="absolute bottom-0 right-0 bg-gray-800 text-white opacity-55 p-1 rounded-full cursor-pointer hover:bg-gray-400">
                        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill="#ffffff" d="M8.123 2a1.5 1.5 0 0 0-1.34.826L6.193 4h-1.69a2.5 2.5 0 0 0-2.5 2.5v8a2.5 2.5 0 0 0 2.5 2.5h3.5q.012-.171.055-.347l.375-1.498c.116-.464.335-.896.639-1.263A4.002 4.002 0 0 1 9.999 6a4 4 0 0 1 3.888 3.056l.216-.215a2.87 2.87 0 0 1 3.9-.147V6.499a2.5 2.5 0 0 0-2.5-2.5h-1.689l-.585-1.17A1.5 1.5 0 0 0 11.887 2zM13 9.945a3 3 0 1 0-3.055 3.054zm1.81-.397l-4.83 4.83a2.2 2.2 0 0 0-.577 1.02l-.375 1.498a.89.89 0 0 0 1.079 1.078l1.498-.374a2.2 2.2 0 0 0 1.02-.578l4.83-4.83a1.87 1.87 0 0 0-2.645-2.644" />
                        </svg>
                        <input name="image" type="file" class="hidden" accept="image/*" id="fileInput">
                    </label>
                </div>
            </div>

            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" required value="{{ $users->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('name') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div class="flex gap-4">
                <div class="w-56">
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" required value="{{ $users->username }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('username') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div class="w-52">
                    <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                    <div class="mt-2">
                        <input id="phone_number" name="phone_number" type="number" required value="{{ $users->phone_number }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('phone_number') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
            </div>

            <p id="reset-password" class="text-center text-primary-500 cursor-pointer">Reset password</p>
            <p id="hide-form-reset" class="text-center text-primary-500 cursor-pointer hidden">Cancel Reset Password</p>

            <div id="reset-password-form" class="hidden">   
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="confirm-password" class="block text-sm font-medium leading-6 text-gray-900 mt-4">Confirm Password</label>
                    <div class="mt-2">
                        <input id="confirm-password" name="confirm_password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            @if (session()->has('password-confirm-error'))
                <small class="text-center text-red-500">{{ session('password-confirm-error') }}</small>
            @endif
            <button type="button" id="edit-user-button" class="mt-4 mb-4 bg-primary-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-primary-400 focus:outline-none">Save</button>
        </form>
    </div>
</x-layout>