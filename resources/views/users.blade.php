<x-layout class="my-4">
    <x-slot:title>{{ $title }}</x-slot>

    <x-table.header :headers="['Nama','Email','Tanggal Verifikasi','Aksi']">
        @foreach ($users as $user)
            <tr class="hover:bg-gray-100">
                <x-table.data>{{ $user->name }}</x-table.data>
                <x-table.data>{{ $user->email }}</x-table.data>
                <x-table.data>{{ $user->email_verified_at }}</x-table.data>
                <x-table.data> <button class="hover:bg-gray-200 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" /></svg></button>  </x-table.data>
            </tr>
        @endforeach
    </x-table.header> 
</x-layout>