<x-public-layout>
    @if($rent)
        <div class="max-w-xl shadow-md min-h-screen bg-white mx-auto"> 
            <br>
            <!-- gambar utama -->
            <img id="main_image1" class="w-full h-64 px-2 rounded-lg" src="" alt="">
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

            <h1 class="px-4 my-4 text-2xl font-medium">{{ $rent->room->building->unit_bangunan }}{{$rent->room->no_kamar}} - {{ $rent->room->building->alamat_bangunan }}</h1>
            <div class="flex items-center justify-center gap-1 bg-gray-900 mx-64 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 64 64"><path fill="#ffc70f" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2z"/></svg>
                <p class="text-white">4.5</p>
            </div>
            <p class="p-4 text-gray-600" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veniam dolorum ab ut placeat laborum corporis incidunt, alias veritatis adipisci neque animi minus nobis saepe, sunt est ad rem non excepturi modi error nisi sint inventore sed? Temporibus voluptatum odit reiciendis magnam minima doloribus in provident totam exercitationem, nemo nisi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veniam dolorum ab ut placeat laborum corporis incidunt, alias veritatis adipisci neque animi minus nobis saepe, sunt est ad rem non excepturi modi error nisi sint inventore sed? Temporibus voluptatum odit reiciendis magnam minima doloribus in provident totam exercitationem, nemo nisi!

            <div class="flex justify-center mb-2">
                <div>
                    <span class="text-4xl font-medium" id="countDownDayPublic"></span>
                    <small>days</small>
                </div>
            </div>
            <div class="flex justify-center">
                <span class="text-lg" id="countDownTimePublic"></span>
            </div>

            <script>
                  $(document).ready(function() {
                    // Set tanggal keluar dari variabel Blade ke dalam JavaScript
                    const tanggalKeluar = new Date("{{ $rent->tanggal_keluar }}").getTime();

     
                    const countdownInterval = setInterval(function() {
                     
                      const now = new Date().getTime();
                      const distance = tanggalKeluar - now;
                      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                      const seconds = Math.floor((distance % (1000 * 60)) / 1000);
     
                      $('#countDownDayPublic').text(`${days}`);
                      $('#countDownTimePublic').text(`${hours}:${minutes}:${seconds}`);
       
                      if(days<=5){
                        $('#countDownDayPublic').addClass('bg-red-600');
                      }
                      if (distance < 0) {
                        $('#countDownDayPublic').text("0");
                        $('#countDownTimePublic').text("0:0:0");
                      }
                    }, 1000);
                  });
                </script>
            <br><br>
            </p>
            <form method="post" action="/timeout/{{ $rent->token }}">
                @csrf
                <input type="hidden" name="id_kamar" value="{{ $rent->room->id }}">
                <input type="hidden" name="id_penyewa" value="{{ auth()->user()->id }}">
                <div class="flex justify-center px-52">
                    <button type="submit" class="mb-6 w-full rounded-md bg-red-600 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Discard</button>
                </div>
            </form>
        </div>
    @else
        <div class="pt-20 max-w-xl shadow-md min-h-screen bg-white mx-auto">
            <h1 class=" text-center text-lg font-medium" >The room you rented is displayed here.</h1> 
        </div>
    @endif
</x-public-layout>