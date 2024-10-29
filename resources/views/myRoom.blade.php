<x-public-layout>
    <div class="max-w-xl shadow-md min-h-screen bg-white mx-auto"> 
        <br>
        <!-- gambar utama -->
        <img id="main_image1" class="w-full h-64 px-1 rounded-md" src="" alt="">
        <br>
            <div class="flex overflow-x-scroll">
                <!-- gambar 1 -->
                <img id="image1" class="w-48 h-24 px-1 rounded-md" src="/storage/{{ $rent->room->gambar_kamar }}" alt="">
                <!-- gambar 2 -->
                <img id="image2" class="w-48 h-24 px-1 rounded-md" src="https://images.unsplash.com/photo-1631555542605-877a63b6e3a6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fHdvb2QlMjBraXRjaGVufGVufDB8fDB8fHww" alt="">
                <!-- gambar 3 -->
                <img id="image3" class="w-48 h-24 px-1 rounded-md" src="https://wpcms.kanggo.id/wp-content/uploads/2022/06/220622-7-Ide-Desain-Kamar-Mandi-yang-Nyaman-dan-Memikat-02.jpg" alt="">
                <!-- gambar 4 -->
                <img id="image4" class="w-48 h-24 px-1 rounded-md" src="https://static.mooimom.id/media/mamapedia/Ohmb3VGQ--main-image.JPG" alt="">
                <!-- gambar 5 -->                
                <img id="image5" class="w-48 h-24 px-1 rounded-md" src="https://wpcms.kanggo.id/wp-content/uploads/2022/06/220622-7-Ide-Desain-Kamar-Mandi-yang-Nyaman-dan-Memikat-02.jpg" alt="">
            </div>

            <h1 class="text-lg font-medium">{{ $rent->room->building->unit_bangunan }}{{$rent->room->no_kamar}} - {{ $rent->room->building->alamat_bangunan }}</h1>


            <script>
                $(document).ready(function() {
                    // Set gambar pertama sebagai gambar utama saat halaman dimuat
                    let firstImageSrc = $('#image1').attr('src');
                    $('#main_image1').attr('src', firstImageSrc);

                    // Saat salah satu gambar diklik
                    $('#image1, #image2, #image3, #image4, #image5').on('click', function() {
                        let clickedImageSrc = $(this).attr('src');
                        $('#main_image1').attr('src', clickedImageSrc);
                    });
                });
            </script>
        <br>
    </div>

</x-public-layout>