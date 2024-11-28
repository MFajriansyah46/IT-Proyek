<x-public-layout>
  <div class="mx-auto max-w-7xl px-1 py-6 sm:px-4 lg:px-1">
    <!-- Your content -->
    @auth('tenant')
        <title>Kos Bang Raja - Hunian Impian Anda</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
                <style>
                    .hero-gradient {
                        background: linear-gradient(135deg, #210d0d, #122f5e, #044c6b);
                        background-size: 400% 400%;
                        animation: gradientBG 15s ease infinite;
                    }
                    @keyframes gradientBG {
                        0% { background-position: 0% 50%; }
                        50% { background-position: 100% 50%; }
                        100% { background-position: 0% 50%; }
                    }
                    .wave-bg {
                        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23f3f4f6' fill-opacity='1' d='M0,96L48,112C96,128,192,160,288,154.7C384,149,480,107,576,101.3C672,96,768,128,864,149.3C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320L192,320L96,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: bottom;
                    }
                </style>
            <body class="bg-gray-50">
                <!-- Hero Section -->
                <header class="hero-gradient text-white relative overflow-hidden">
                    <div class="container mx-auto px-5 py-24 relative z-10 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <!-- Bagian Teks -->
                        <div>
                            <h1 class="text-6xl font-extrabold mb-7 animate__animated animate__fadeInDown">
                                Kos Bang Raja
                            </h1>
                            <p class="text-2xl mb-10 text-light max-w-xl animate__animated animate__fadeInUp">
                                Tempat Tinggal Nyaman, Aman, dan Inspiratif untuk Mahasiswa dan Profesional Muda
                            </p>
                            <div class="space-x-4">
                                <a href="#" class="bg-white text-indigo-600 px-10 py-4 rounded-full font-bold 
                                    hover:bg-indigo-50 transition transform hover:scale-105 inline-block 
                                    animate__animated animate__pulse animate__delay-2s">
                                    Pesan Sekarang
                                </a>
                                <a href="#fasilitas" class="bg-transparent border-2 border-white text-white px-10 py-4 
                                    rounded-full font-bold hover:bg-white hover:text-indigo-600 
                                    transition transform hover:scale-105 inline-block">
                                    Lihat Fasilitas
                                </a>
                            </div>
                        </div>
                        <!-- Bagian Gambar -->
                        <div class="text-center md:text-right">
                            <img src="{{ asset('storage/image/kosan.png') }}" alt="Ilustrasi Kamar Kos" class="W-64 h-64 rounded-full max-auto md:mx-10 object-cover shadow-lg">
                        </div>  
                    </div>
                    <div class="absolute inset-0\\ bg-black opacity-"></div>
                </header>
               <!-- Section Daftar Kamar Rekomendasi -->
                <section class="py-16 bg-gradient-to-b from-gray-100 to-gray-200" id="kamar-rekomendasi">
                    <div class="container mx-auto px-6">
                        <h2 class="text-4xl font-extrabold text-center mb-12 text-gray-800 border-b-4 border-indigo-500 inline-block pb-2">
                            Kamar yang Direkomendasikan
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            <!-- Card Kamar 1 -->
                            <div class="bg-white shadow-lg rounded-3xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-500">
                                <img src="https://via.placeholder.com/400x250" alt="Kamar Deluxe" class="w-full h-56 object-cover">
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Gedung A</h3>
                                    <p class="text-gray-500 text-sm mb-4">Harga: <span class="font-semibold text-indigo-600">Rp 1.500.000/bulan</span></p>
                                    <ul class="mb-4 text-gray-600 text-sm space-y-2">
                                        <li>✔️ AC dan TV</li>
                                        <li>✔️ Kamar mandi dalam</li>
                                        <li>✔️ Internet kecepatan tinggi</li>
                                    </ul>
                                    <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-full 
                                        hover:bg-indigo-500 transition block text-center font-bold">
                                        Daftar kamar
                                    </a>
                                </div>
                            </div>

                            <!-- Card Kamar 2 -->
                            <div class="bg-white shadow-lg rounded-3xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-500">
                                <img src="https://via.placeholder.com/400x250" alt="Kamar Standard" class="w-full h-56 object-cover">
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Gedung B</h3>
                                    <p class="text-gray-500 text-sm mb-4">Harga: <span class="font-semibold text-indigo-600">Rp 1.000.000/bulan</span></p>
                                    <ul class="mb-4 text-gray-600 text-sm space-y-2">
                                        <li>✔️ Kipas angin</li>
                                        <li>✔️ Kamar mandi bersama</li>
                                        <li>✔️ Akses WiFi</li>
                                    </ul>
                                    <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-full 
                                        hover:bg-indigo-500 transition block text-center font-bold">
                                        Daftar Kamar
                                    </a>
                                </div>
                            </div>

                            <!-- Card Kamar 3 -->
                            <div class="bg-white shadow-lg rounded-3xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-500">
                                <img src="https://via.placeholder.com/400x250" alt="Kamar Ekonomi" class="w-full h-56 object-cover">
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Gedung C</h3>
                                    <p class="text-gray-500 text-sm mb-4">Harga: <span class="font-semibold text-indigo-600">Rp 750.000/bulan</span></p>
                                    <ul class="mb-4 text-gray-600 text-sm space-y-2">
                                        <li>✔️ Kipas angin</li>
                                        <li>✔️ Kamar mandi luar</li>
                                        <li>✔️ Lingkungan nyaman</li>
                                    </ul>
                                    <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-full 
                                        hover:bg-indigo-500 transition block text-center font-bold">
                                        Daftar Kamar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <!-- Keunggulan -->
            <section class="container mx-auto px-4 py-20 wave-bg">
                <h2 class="text-4xl font-extrabold text-center text-indigo-700 mb-16 border-b-4 border-green-400 pb-4">
                    Mengapa Memilih Kos Bang Raja?
                </h2>
                <div class="grid md:grid-cols-3 gap-10">
                    <!-- Card 1: Lokasi Strategis -->
                    <div class="bg-white p-10 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:shadow-lg hover:scale-105 transition duration-500 text-center">
                        <div class="icon-container bg-indigo-200 p-5 rounded-full mb-6 mx-auto w-20 h-20 flex items-center justify-center">
                            <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-indigo-800 mb-4">Lokasi Strategis</h3>
                        <p class="text-gray-600">Dekat kampus, pusat kota, dan fasilitas umum.</p>
                    </div>
            
                    <!-- Card 2: Keamanan Terjamin -->
                    <div class="bg-white p-10 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:shadow-lg hover:scale-105 transition duration-500 text-center">
                        <div class="icon-container bg-green-200 p-5 rounded-full mb-6 mx-auto w-20 h-20 flex items-center justify-center">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-green-800 mb-4">Keamanan Terjamin</h3>
                        <p class="text-gray-600">Pengawasan 24 jam dan sistem keamanan modern.</p>
                    </div>
            
                    <!-- Card 3: Fasilitas Lengkap -->
                    <div class="bg-white p-10 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:shadow-lg hover:scale-105 transition duration-500 text-center">
                        <div class="icon-container bg-purple-200 p-5 rounded-full mb-6 mx-auto w-20 h-20 flex items-center justify-center">
                            <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-purple-800 mb-4">Fasilitas Lengkap</h3>
                        <p class="text-gray-600">WiFi cepat, lingkungan nyaman, dan masih banyak lagi.</p>
                    </div>
                </div>
            </section>
            
            <!-- Fasilitas -->
            <section id="fasilitas" class="container mx-auto px-4 py-20 bg-gray-100">
                <h2 class="text-4xl font-bold text-center text-indigo-700 mb-16 border-b-4 border-green-400 pb-4">
                    Fasilitas Lengkap
                </h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center transform hover:-translate-y-2 hover:bg-indigo-50 transition">
                        <svg class="w-16 h-16 mx-auto text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="font-bold text-indigo-800">Listrik Siap Pakai</h3>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center transform hover:-translate-y-2 hover:bg-green-50 transition">
                        <svg class="w-16 h-16 mx-auto text-green-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="font-bold text-green-800">WiFi Cepat</h3>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center transform hover:-translate-y-2 hover:bg-purple-50 transition">
                        <svg class="w-16 h-16 mx-auto text-purple-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="font-bold text-purple-800">Kamar Mandi Dalam</h3>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center transform hover:-translate-y-2 hover:bg-pink-50 transition">
                        <svg class="w-16 h-16 mx-auto text-pink-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="font-bold text-pink-800">Ruang Berprivasi</h3>
                    </div>
                </div>
            </section>

            <!-- Testimoni -->
            <section class="container mx-auto px-4 py-20 bg-white">
                <h2 class="text-4xl font-bold text-center text-indigo-700 mb-16 border-b-4 border-green-400 pb-4">
                    Kata Mereka Tentang Kami
                </h2>
                <div class="grid md:grid-cols-3 gap-10">
                    <div class="bg-gray-100 p-8 rounded-3xl shadow-lg">
                        <p class="italic mb-6">"Kos Bang Raja benar-benar membantu saya fokus kuliah dengan lingkungan yang nyaman dan kondusif."</p>
                        <div class="flex items-center">
                            <img src="/api/placeholder/80/80" alt="Testimoni" class="w-16 h-16 rounded-full mr-4">
                            <div>
                                <h4 class="font-bold text-indigo-800">Ahmad Rifai</h4>
                                <p class="text-gray-600">Mahasiswa Teknik</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-8 rounded-3xl shadow-lg">
                        <p class="italic mb-6">"Keamanan dan fasilitasnya top banget! Merasa aman dan nyaman tinggal di sini."</p>
                        <div class="flex items-center">
                            <img src="/api/placeholder/80/80" alt="Testimoni" class="w-16 h-16 rounded-full mr-4">
                            <div>
                                <h4 class="font-bold text-indigo-800">Sarah Amelia</h4>
                                <p class="text-gray-600">Mahasiswi Kedokteran</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-8 rounded-3xl shadow-lg">
                        <p class="italic mb-6">"Lokasi strategis, biaya terjangkau. Solusi sempurna bagi mahasiswa!"</p>
                        <div class="flex items-center">
                            <img src="/api/placeholder/80/80" alt="Testimoni" class="w-16 h-16 rounded-full mr-4">
                            <div>
                                <h4 class="font-bold text-indigo-800">Budi Santoso</h4>
                                <p class="text-gray-600">Mahasiswa Ekonomi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="bg-gray-900 text-white py-12">
                <div class="container mx-auto px-4">
                    <div class="grid md:grid-cols-3 gap-10">
                        <div>
                            <h3 class="text-2xl font-bold mb-4">Kos Bang Raja</h3>
                            <p class="text-gray-300">Tempat tinggal nyaman dan aman untuk mahasiswa dan profesional muda.</p>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold mb-4">Kontak Kami</h4>
                            <p>📍 Jalan Kos Bang Raja No. 123</p>
                            <p>☎️ +62 812-3456-7890</p>
                            <p>✉️ info@kosbangraja.com</p>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold mb-4">Ikuti Kami</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="hover:text-indigo-300">Instagram</a>
                                <a href="#" class="hover:text-indigo-300">WhatsApp</a>
                                <a href="#" class="hover:text-indigo-300">Facebook</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-10 border-t border-gray-700 pt-6">
                        <p>© 2024 Kos Bang Raja. Hak Cipta Dilindungi.</p>
                    </div>
                </div>
            </footer>
    @endauth
    </div>
</x-public-layout>