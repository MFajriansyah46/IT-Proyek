<x-public-layout>
    <div>
        @auth('tenant')
          
           
        @else
            <div>
                <!-- Konten untuk pengguna yang tidak diautentikasi sebagai tenant -->
                <p>Anda belum login sebagai tenant.</p>
            </div>
        @endauth
    </div>
</x-public-layout>
