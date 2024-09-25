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
        
    </div>
</x-layout>