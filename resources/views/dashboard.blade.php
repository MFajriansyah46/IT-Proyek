<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-3 gap-6 mt-6">
            <div class="bg-blue-500 rounded-lg p-4 text-white">
                <h2 class="text-2xl">8,282</h2>
                <p>New Users</p>
            </div>
            <div class="bg-green-500 rounded-lg p-4 text-white">
                <h2 class="text-2xl">200,521</h2>
                <p>Total Orders</p>
            </div>
            <div class="bg-purple-500 rounded-lg p-4 text-white">
                <h2 class="text-2xl">215,542</h2>
                <p>Available Products</p>
            </div>
        </div>
        <div class="mt-8 overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr> 
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td>Adi Prasetya</td>
                        <td>Manager</td>
                        <td>Active</td>
                        <td>6281251960000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout>