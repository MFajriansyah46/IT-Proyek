<x-layout class="my-4">
    <x-slot:title>{{ $title }}</x-slot>
    <div class="mt-8 overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr> 
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">email</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Verified</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr class="border-b-2">
                        <td class="p-2 text-left"> {{ $user['name'] }} </td>
                        <td class="p-2 text-left"> {{ $user['email'] }} </td>
                        <td class="p-2 text-left"> {{ $user['email_verified_at'] }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>