<x-public-layout>
  <div class="mx-auto max-w-7xl px-1 py-6 sm:px-4 lg:px-8">
    <!-- Your content -->
    @auth('tenant')
    <header class="bg-gray-600 text-white py-20">
      <div class="container mx-auto text-center">
          <h1 class="text-4xl font-bold">Temukan Kost Idamanmu di Kos Bang Raja!</h1>
          <p class="mt-4 text-lg">Berbagai pilihan kamar dengan fasilitas terbaik, harga terjangkau, dan lokasi strategis.</p>
          <div class="mt-9">
              <a href="#rooms" class="bg-white text-blue-600 px-6 py-3 rounded-md font-medium shadow-md hover:bg-gray-200">Lihat Kamar</a>
              <a href="#contact" class="bg-yellow-500 text-white px-6 py-3 rounded-md font-medium shadow-md hover:bg-yellow-400 ml-4">Hubungi Kami</a>
          </div>
      </div>
  </header>

  <!-- Tentang Kos Bang Raja -->
  <section class="py-16 bg-white">
      <div class="container mx-auto text-center">
          <h2 class="text-3xl font-bold text-gray-800">Kenapa Memilih Kos Bang Raja?</h2>
          <p class="mt-4 text-gray-600">Kami menyediakan solusi lengkap untuk mencari, memesan, dan membayar kost secara online.</p>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
              <div class="p-6 bg-gray-50 rounded-lg shadow">
                  <h3 class="text-xl font-semibold text-blue-600">Pembayaran Aman</h3>
                  <p class="mt-2 text-gray-600">Dukungan bank lokal dan platform digital seperti DANA dan ShopeePay.</p>
              </div>
              <div class="p-6 bg-gray-50 rounded-lg shadow">
                  <h3 class="text-xl font-semibold text-blue-600">Pemesanan Mudah</h3>
                  <p class="mt-2 text-gray-600">Pesan kost tanpa perlu datang langsung ke lokasi.</p>
              </div>
              <div class="p-6 bg-gray-50 rounded-lg shadow">
                  <h3 class="text-xl font-semibold text-blue-600">Fasilitas Lengkap</h3>
                  <p class="mt-2 text-gray-600">Detail lengkap termasuk kecepatan internet, lokasi di Google Maps, dan lainnya.</p>
              </div>
          </div>
      </div>
  </section>

  <!-- Daftar Kost Terbaru -->
  <section id="rooms" class="py-16 bg-gray-100">
      <div class="container mx-auto text-center">
          <h2 class="text-3xl font-bold text-gray-800">Kost Tersedia untuk Anda</h2>
          <p class="mt-4 text-gray-600">Pilih kost terbaik sesuai kebutuhan Anda.</p>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
              <!-- Card 1 -->
              <div class="bg-white rounded-lg shadow overflow-hidden">
                  <img src="https://via.placeholder.com/300" alt="Kamar Kost" class="w-full">
                  <div class="p-6">
                      <h3 class="text-xl font-semibold text-gray-800">Kost A</h3>
                      <p class="text-gray-600 mt-2">Lokasi: Jl. Pemuda no.2</p>
                      <p class="text-gray-800 font-bold mt-4">Rp1.500.000 / bulan</p>
                      <a href="#" class="block mt-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 text-center">Detail</a>
                  </div>
              </div>
              <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Kamar Kost" class="w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Kost A</h3>
                    <p class="text-gray-600 mt-2">Lokasi: Jl. Pemuda no.2</p>
                    <p class="text-gray-800 font-bold mt-4">Rp1.500.000 / bulan</p>
                    <a href="#" class="block mt-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 text-center">Detail</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <img src="https://via.placeholder.com/300" alt="Kamar Kost" class="w-full">
              <div class="p-6">
                  <h3 class="text-xl font-semibold text-gray-800">Kost A</h3>
                  <p class="text-gray-600 mt-2">Lokasi: Jl. Pemuda no.2</p>
                  <p class="text-gray-800 font-bold mt-4">Rp1.500.000 / bulan</p>
                  <a href="#" class="block mt-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 text-center">Detail</a>
              </div>
          </div>
              <!-- Tambahkan lebih banyak card di sini -->
          </div>
      </div>
  </section>

  <!-- Testimoni Pengguna -->
  <section class="py-16 bg-white">
      <div class="container mx-auto text-center">
          <h2 class="text-3xl font-bold text-gray-800">Apa Kata Pengguna Kami?</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
              <div class="p-6 bg-gray-50 rounded-lg shadow">
                  <p class="text-gray-600 italic">"Proses pemesanan sangat mudah, dan fasilitas kost sesuai deskripsi!"</p>
                  <p class="text-gray-800 font-bold mt-4">- Andi</p>
              </div>
              <div class="p-6 bg-gray-50 rounded-lg shadow">
                  <p class="text-gray-600 italic">"Saya suka sistem pembayaran yang fleksibel dan aman!"</p>
                  <p class="text-gray-800 font-bold mt-4">- Siti</p>
              </div>
          </div>
      </div>
  </section>

  <!-- Informasi Kontak -->
  <section id="contact" class="py-16 bg-blue-600 text-white">
      <div class="container mx-auto text-center">
          <h2 class="text-3xl font-bold">Hubungi Kami</h2>
          <p class="mt-4">Ada pertanyaan? Kami siap membantu Anda!</p>
          <p class="mt-4">Email: info@kosbangraja.com</p>
          <p class="mt-2">Telepon/WhatsApp: +62 812-3456-7890</p>
          <p class="mt-2">Alamat: Jl. Pemuda No.2 Blok F, Desa Pemuda, Indonesia</p>
      </div>
  </section>

  <!-- Footer -->
  <footer class="py-6 bg-gray-800 text-white">
      <div class="container mx-auto text-center">
          <p>&copy; 2024 Kos Bang Raja. All rights reserved.</p>
      </div>
  </footer>
</body>
</html>  
    @endauth
    </div>
  
    {{-- <!-- Header -->
    <header class="bg-gray-600 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">Temukan Kost Idamanmu di Kos Bang Raja!</h1>
            <p class="mt-4 text-lg">Berbagai pilihan kamar dengan fasilitas terbaik, harga terjangkau, dan lokasi strategis.</p>
            <div class="mt-9">
                <a href="#rooms" class="bg-white text-blue-600 px-6 py-3 rounded-md font-medium shadow-md hover:bg-gray-200">Lihat Kamar</a>
                <a href="#contact" class="bg-yellow-500 text-white px-6 py-3 rounded-md font-medium shadow-md hover:bg-yellow-400 ml-4">Hubungi Kami</a>
            </div>
        </div>
    </header>

    <!-- Tentang Kos Bang Raja -->
    <section class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Kenapa Memilih Kos Bang Raja?</h2>
            <p class="mt-4 text-gray-600">Kami menyediakan solusi lengkap untuk mencari, memesan, dan membayar kost secara online.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="p-6 bg-gray-50 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-blue-600">Pembayaran Aman</h3>
                    <p class="mt-2 text-gray-600">Dukungan bank lokal dan platform digital seperti DANA dan ShopeePay.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-blue-600">Pemesanan Mudah</h3>
                    <p class="mt-2 text-gray-600">Pesan kost tanpa perlu datang langsung ke lokasi.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-blue-600">Fasilitas Lengkap</h3>
                    <p class="mt-2 text-gray-600">Detail lengkap termasuk kecepatan internet, lokasi di Google Maps, dan lainnya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Kost Terbaru -->
    <section id="rooms" class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Kost Tersedia untuk Anda</h2>
            <p class="mt-4 text-gray-600">Pilih kost terbaik sesuai kebutuhan Anda.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Kamar Kost" class="w-full">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Kost A</h3>
                        <p class="text-gray-600 mt-2">Lokasi: Jl. Pemuda no.2</p>
                        <p class="text-gray-800 font-bold mt-4">Rp1.500.000 / bulan</p>
                        <a href="#" class="block mt-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 text-center">Detail</a>
                    </div>
                </div>
                <!-- Tambahkan lebih banyak card di sini -->
            </div>
        </div>
    </section>

    <!-- Testimoni Pengguna -->
    <section class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Apa Kata Pengguna Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div class="p-6 bg-gray-50 rounded-lg shadow">
                    <p class="text-gray-600 italic">"Proses pemesanan sangat mudah, dan fasilitas kost sesuai deskripsi!"</p>
                    <p class="text-gray-800 font-bold mt-4">- Andi</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg shadow">
                    <p class="text-gray-600 italic">"Saya suka sistem pembayaran yang fleksibel dan aman!"</p>
                    <p class="text-gray-800 font-bold mt-4">- Siti</p>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <!-- Informasi Kontak -->
    <section id="contact" class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Hubungi Kami</h2>
            <p class="mt-4">Ada pertanyaan? Kami siap membantu Anda!</p>
            <p class="mt-4">Email: info@kosbangraja.com</p>
            <p class="mt-2">Telepon/WhatsApp: +62 812-3456-7890</p>
            <p class="mt-2">Alamat: Jl. Pemuda No.2 Blok F, Desa Pemuda, Indonesia</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 bg-gray-800 text-white">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Kos Bang Raja. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> --}}

</x-public-layout>