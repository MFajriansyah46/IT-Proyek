<x-layout>
    <h1 class="text-5xl font-bold text-gray-800 mt-8 mb-6">Dashboard</h1>
    <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-6">
        <div class="bg-blue-500 rounded-lg p-4 text-white">
        <h2 class="text-2xl">{{ $countUser }}</h2>
            <p>Users total</p>
        </div>
        <div class="bg-green-500 rounded-lg p-4 text-white">
            <h2 class="text-2xl">{{ $countRoom }}</h2>
            <p>Rooms total</p>
        </div>
        <div class="bg-red-500 rounded-lg p-4 text-white">
            <h2 class="text-2xl">{{ $countBuilding }}</h2>
            <p>Buildings total</p>
        </div>
        <div class="bg-yellow-500 rounded-lg p-4 text-white">
            <h2 class="text-2xl">215,542</h2>
            <p>Pendapatan Bulan ini</p>
        </div>
    </div>
</x-layout>