<x-public-layout>
    <div class="max-w-xl shadow-md min-h-screen bg-white mx-auto"> 
        <br>
        <!-- gambar utama -->
        <img id="main_image1" class="w-full h-64 px-1 rounded-md" src="/storage/{{ $room->gambar_kamar }}" alt="">
        <br>
            <div class="flex overflow-x-scroll">
                <!-- gambar 1 -->
                <img id="image1" class="w-48 h-24 px-1 rounded-md" src="/storage/{{ $room->gambar_kamar }}" alt="">
                <!-- gambar 2 -->
                <img id="image2" class="w-48 h-24 px-1 rounded-md" src="https://images.unsplash.com/photo-1631555542605-877a63b6e3a6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fHdvb2QlMjBraXRjaGVufGVufDB8fDB8fHww" alt="">
                <!-- gambar 3 -->
                <img id="image3" class="w-48 h-24 px-1 rounded-md" src="https://wpcms.kanggo.id/wp-content/uploads/2022/06/220622-7-Ide-Desain-Kamar-Mandi-yang-Nyaman-dan-Memikat-02.jpg" alt="">
                <!-- gambar 4 -->
                <img id="image4" class="w-48 h-24 px-1 rounded-md" src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/97/MTA-146183326/no_brand_meja_belajar_lipat_serbaguna_-_meja_belajar_anak_-_laptop_portable_desk_full15_fnq9kyhx.jpg" alt="">
            </div>
            <script>
                $(document).ready(function() {
                    // Set gambar pertama sebagai gambar utama saat halaman dimuat
                    let firstImageSrc = $('#image1').attr('src');
                    $('#main_image1').attr('src', firstImageSrc);

                    // Saat salah satu gambar diklik
                    $('#image1, #image2, #image3, #image4').on('click', function() {
                        let clickedImageSrc = $(this).attr('src');
                        $('#main_image1').attr('src', clickedImageSrc);
                    });
                });
            </script>
        <br>

        <!-- <img id="main_image1" class="w-full h-64 px-1 rounded-md" src="/storage/" alt="">
        <br>
        <div class="flex overflow-x-scroll">
            @ - foreach($images as $image)
                <img class="thumbnail1 w-48 h-24 px-1 rounded-md" src="/storage/" alt="">
            @ - endforeach
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        -->


        @auth('tenant')
            @if(!$rent)
                <form method="post" action="/checkout">
                    @csrf
                    <input type="hidden" name="id_kamar" value="{{ $room->id_kamar }}">
                    <input type="hidden" name="id_penyewa" value="{{ auth('tenant')->user()->id }}">
                    <input type="hidden" name="biaya" value="{{ $room->harga_kamar }}">
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</button>
                </form>
            @else
                <p class="flex w-full justify-center rounded-md px-3 pt-1.5 text-lg text-gray-600 font-semibold leading-6">You have already rented another room that hasn't expired yet.</p>
                <div class="w-full flex justify-center">
                    <a href="#" class="w-32 px-3 py-1.5 text-lg text-blue-400 hover:text-blue-300 font-semibold">My Room &raquo;</a>
                </div>
            @endif
        @else
            <a href="/login" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</a>
        @endauth
    </div>
</x-public-layout>