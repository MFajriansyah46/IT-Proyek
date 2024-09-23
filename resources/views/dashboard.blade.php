<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Bang Raja</title>
</head class="h-full">
<body>
<div class="flex h-screen">
    <nav class="flex flex-col bg-gray-800 w-64">
        <div class="flex flex-row items-center p-8 gap-3">
            <img class="h-12 w-12" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="">
            <h3 class="text-gray-200 text-xl">Kos Bang Raja</h3>
        </div>
        <a href="/dashboard" class="text-sm px-8 py-3 text-gray-200 bg-gray-700 hover:bg-gray-500 border-l-4 border-gray-200">Dashboard</a>
        <a href="#" class="text-sm px-8 py-3 text-gray-200 hover:bg-gray-500">Users</a>
        <a href="#" class="text-sm px-8 py-3 text-gray-200 hover:bg-gray-500">Contact</a>
        <a href="#" class="text-sm px-8 py-3 text-gray-200 hover:bg-gray-500">History</a>
        <a href="#" class="text-sm px-8 py-3 text-gray-200 hover:bg-gray-500">About</a>
        <a href="#" class="text-sm px-8 py-3 text-gray-200 hover:bg-gray-500">Help</a>
        <a href="#" class="text-sm px-8 py-3 text-gray-200 hover:bg-gray-500">Log Out</a>
    </nav>

    <main class="flex-1">
        <header>
            <div class="bg-yellow-300 shadow m-0">
                <div class="mx-0 px-4 py-8 sm:px-6 lg:px-8 border-b-2 border-gray-300">
                </div>
            </div>
        </header>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mt-8">Dashboard</h1>
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
    </main>
</body>
</html>