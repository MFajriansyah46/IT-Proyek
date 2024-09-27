<x-layout class="my-4">
    <x-slot:title>{{ $title }}</x-slot>

    <x-table.header :headers="['Nama','Email','Tanggal Verifikasi']">
        @foreach ($users as $user)
            <tr class="hover:bg-gray-100">
                <x-table.data>{{ $user->name }}</x-table.data>
                <x-table.data>{{ $user->email }}</x-table.data>
                <x-table.data>{{ $user->email_verified_at }}</x-table.data>
            </tr>
        @endforeach
    </x-table.header>
</x-layout>