<x-public-layout>
   <div>   
        @auth('tenant')
            <style>
                .gradient-bg {
                    background: linear-gradient(45deg, #0a0b29, #3b82f6, #102e24);
                    background-size: 400% 400%;
                    animation: gradientBG 15s ease infinite;
                }
                @keyframes gradientBG {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }
            </style>
            <body class="bg-red-50">
                <div class="relative overflow-hidden">
                    <!-- Header dengan Gradient Animasi -->
                    <header class="gradient-bg text-white py-20 px-4 text-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="relative z-10 container mx-auto">
                            <h1 class="text-6xl font-extrabold mb-4 animate__animated animate__fadeInDown">
                                Kos Bang Raja
                            </h1>
                            <p class="text-xl mb-8 animate__animated animate__fadeInUp">
                                Tempat Tinggal Nyaman nan Eksklusif
                            </p>
                            <a href="#kontak" class="bg-white text-indigo-600 px-8 py-3 rounded-full font-bold 
                                hover:bg-indigo-50 transition transform hover:scale-105 inline-block 
                                animate__animated animate__pulse animate__delay-2s">
                                Hubungi Kami
                            </a>
                        </div>
                    </header>
                    <!-- Konten Utama -->
                    < class="container mx-auto px-4 py-16 space-y-12">
                        <!-- Tentang Kami -->
                        <section class="grid md:grid-cols-2 gap-10 items-center">
                            <div class="bg-white shadow-2xl rounded-3xl p-8 transform hover:scale-105 transition duration-300">
                                <h2 class="text-4xl font-bold text-indigo-700 mb-6 border-b-4 border-green-400 pb-4">
                                    Tentang Kami
                                </h2>
                                <p class="text-gray-700 text-lg leading-relaxed">
                                    Kos Bang Raja hadir sebagai solusi hunian premium untuk mahasiswa dan profesional muda. 
                                    Kami tidak sekadar menyediakan tempat tinggal, tapi menciptakan komunitas yang mendukung 
                                    pertumbuhan dan kesuksesan Anda.
                                </p>
                            </div>
                            <div class="relative">
                                <div class="bg-indigo-100 rounded-full w-72 h-72 absolute -top-10 -left-10 animate-blob"></div>
                                <div class="bg-green-100 rounded-full w-64 h-64 absolute -bottom-8 -right-8 animate-blob animation-delay-2000"></div>
                                <img src="/api/placeholder/500/500" alt="Kos Bang Raja" class="relative z-10 rounded-3xl shadow-2xl">
                            </div>
                        </section>
                        <!-- Fasilitas -->
                        <section class="bg-white rounded-3xl shadow-2xl p-12">
                            <h2 class="text-4xl font-bold text-center text-indigo-700 mb-12 border-b-4 border-green-400 pb-4">
                                Fasilitas Unggulan
                            </h2>
                            <div class="grid md:grid-cols-3 gap-8">
                                <div class="bg-indigo-50 p-6 rounded-2xl text-center hover:bg-indigo-100 transition transform hover:scale-105">
                                    <svg class="w-16 h-16 mx-auto text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="text-xl font-bold text-indigo-800">Kamar Ber-AC</h3>
                                    <p class="text-gray-600">Nyaman dengan pendingin modern</p>
                                </div>
                                <div class="bg-green-50 p-6 rounded-2xl text-center hover:bg-green-100 transition transform hover:scale-105">
                                    <svg class="w-16 h-16 mx-auto text-green-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="text-xl font-bold text-green-800">WiFi Cepat</h3>
                                    <p class="text-gray-600">Internet tanpa batas</p>
                                </div>
                                <div class="bg-purple-50 p-6 rounded-2xl text-center hover:bg-purple-100 transition transform hover:scale-105">
                                    <svg class="w-16 h-16 mx-auto text-purple-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="text-xl font-bold text-purple-800">Keamanan 24/7</h3>
                                    <p class="text-gray-600">Penjagaan sepanjang waktu</p>
                                </div>
                            </div>
                        </section>
                    <!-- Lokasi -->
                    <section id="kontak" class="grid md:grid-cols-2 gap-10 bg-white rounded-3xl shadow-2xl p-12">
                        <div>
                            <h2 class="text-4xl font-bold text-indigo-700 mb-6 border-b-4 border-green-400 pb-4">
                                Lokasi Strategis
                            </h2>
                            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                Terletak di pusat kota, Kos Bang Raja memberikan akses mudah ke kampus, 
                                pusat perbelanjaan, dan fasilitas umum lainnya.
                            </p>
                            <div class="bg-indigo-50 p-6 rounded-2xl">
                                <p class="font-bold text-indigo-700 mb-2">📍 Alamat:</p>
                                <p class="text-gray-700">Jalan Kos Bang Raja No. 123, Kota</p>
                                <p class="font-bold text-indigo-700 mt-4 mb-2">☎️ Kontak:</p>
                                <p class="text-gray-700">+62 812-3456-7890</p>
                            </div>
                        </div>
                        <div class="bg-gray-200 rounded-3xl overflow-hidden">
                            <div class="w-full h-full">
                                <img src="/api/placeholder/600/400" alt="Lokasi Kos" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </section>
                    <!-- Footer -->
                    <footer class="bg-gray-900 text-white py-8">
                        <div class="container mx-auto text-center">
                            <p>© 2024 Kos Bang Raja. Hak Cipta Dilindungi.</p>
                            <div class="flex justify-center space-x-4 mt-4">
                                <a href="#" class="hover:text-indigo-300">Instagram</a>
                                <a href="#" class="hover:text-indigo-300">WhatsApp</a>
                                <a href="#" class="hover:text-indigo-300">Email</a>
                            </div>
                        </div>
                    </footer>
                </div> 
        @else
            <div>
                <!-- Konten untuk pengguna yang tidak diautentikasi sebagai tenant -->
                <p>Anda belum login sebagai tenant.</p>
            </div>
        @endauth
    </div> 
</x-public-layout>
