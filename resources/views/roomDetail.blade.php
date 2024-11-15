<x-public-layout>
    <div class="max-w-xl shadow-md min-h-screen bg-white mx-auto"> 
        <br>    
        <img id="main_image" class="w-full h-64 px-1 rounded-md" src="/storage/{{ $room->gambar_kamar }}" alt="">
        <br>
        <div class="flex overflow-x-scroll">
            <img class="thumbnail1 w-48 h-24 px-1 rounded-md" src="/storage/{{ $room->gambar_kamar }}" alt="">
            @foreach($room->facilities as $facility)
                @if($facility->image)
                    <img class="thumbnail1 w-48 h-24 px-1 rounded-md" src="/storage/{{ $facility->image }}" alt="">
                @endif
            @endforeach
            <img class="thumbnail1 w-48 h-24 px-1 rounded-md" src="/storage/{{ $room->building->gambar_bangunan }}" alt="">
        </div>
        <script>
            $(document).ready(function() {
                // Set gambar pertama dari daftar sebagai gambar utama saat halaman dimuat
                let firstImageSrc = $('.thumbnail1').first().attr('src');
                $('#main_image').attr('src', firstImageSrc);

                // Saat salah satu gambar dengan kelas 'thumbnail' diklik
                $('.thumbnail1').on('click', function() {
                    let clickedImageSrc = $(this).attr('src');
                    $('#main_image').attr('src', clickedImageSrc);
                });
            });
        </script> 
        <br>

        <h1 class="px-4 my-6 text-2xl text-gray-900 font-medium">{{ $room->building->unit_bangunan }}{{ $room->no_kamar }} - {{ $room->building->alamat_bangunan }}</h1>
            
        <div class="flex justify-between items-center mx-4 -mb-4">
            <p class="text-green-600 text-2xl font-medium w-60 ">Rp {{ number_format($room->harga_kamar, 2, ',', '.') }}</p>
            <div class="flex items-center justify-center bg-gray-900 hover:bg-gray-600 rounded-2xl gap-1 w-16 px-2 py-1">
                <button id="rate-button" class="flex items-center justify-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 64 64"><path fill="#ffc70f" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2z"/></svg>
                    <p class="text-white text-sm">{{ number_format($room->rates->average('rate'),1) }}</p>
                </button>
            </div>
            <div class="w-60 flex items-center justify-end">
                <a href="{{ $room->building->link_gmap }}" class="flex items-center justify-end" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2rem" height="2.2rem" viewBox="0 0 20 20">
                        <path fill="#e02424" d="M10 0a7.65 7.65 0 0 0-8 8c0 2.52 2 5 3 6s5 6 5 6s4-5 5-6s3-3.48 3-6a7.65 7.65 0 0 0-8-8m0 11.25A3.25 3.25 0 1 1 13.25 8A3.25 3.25 0 0 1 10 11.25" />
                    </svg>
                </a>
            </div>
        </div>
        <br>
        <div id="desc-area-my-room" class="p-4 overflow-hidden">
            <p class="text-gray-600" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veniam dolorum ab ut placeat laborum corporis incidunt, alias veritatis adipisci neque animi minus nobis saepe. sunt est ad rem non excepturi modi error nisi sint inventore sed? Temporibus voluptatum odit reiciendis magnam minima doloribus in provident totam exercitationem, nemo nisi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veniam dolorum ab ut placeat laborum corporis incidunt, alias veritatis adipisci neque animi minus nobis saepe, sunt est ad rem non excepturi modi error nisi sint inventore sed? Temporibus voluptatum odit reiciendis magnam minima doloribus in provident totam exercitationem, nemo nisi!</p>
        </div>
        <div class="flex justify-center items-center mt-2">
            <button type="button" id="more-desc-my-room" class="flex items-center gap-1 text-blue-600 hover:text-blue-400">
                <p>More</p>
                <svg id="right-arrow" width="14" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7 2 L17 12 L7 22" />
                </svg>
                <svg id="buttom-arrow" width="16" height="14" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 7 L12 17 L22 7" />
                </svg>
            </button>
        </div>
        <br><br>
        @auth('tenant')
            @if(!$rent)
                <form method="post" action="/checkout" class="h-24 mx-4">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id_kamar }}">
                    <input type="hidden" name="tenant_id" value="{{ auth('tenant')->user()->id }}">
                    <input type="hidden" name="price" value="{{ $room->harga_kamar }}">
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</button>
                </form>
            @else
                <p class="flex w-full justify-center rounded-md px-3 pt-1.5 text-lg text-gray-600 font-semibold leading-6">You have already rented another room that hasn't expired yet.</p>
                <div class="w-full flex justify-center h-24">
                    <a href="/myroom" class="w-32 px-3 py-1.5 text-blue-600 hover:text-blue-400 font-semibold">My Room &raquo;</a>
                </div>
            @endif
        @else
            <a href="/login" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</a>
        @endauth
    </div>
</x-public-layout>