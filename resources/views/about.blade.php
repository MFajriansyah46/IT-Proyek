<x-public-layout>
   <div>   
        @auth('tenant')
            <div>
                <!-- Konten khusus untuk pengguna tenant -->
               <h1>selamat datang</h1>
        @else
            <div>
                <!-- Konten untuk pengguna yang tidak diautentikasi sebagai tenant -->
                <p>Anda belum login sebagai tenant.</p>
            </div>
        @endauth
    </div> 
</x-public-layout>
