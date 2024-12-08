<x-public-layout>
    @if($rent)
        <div class="max-w-xl shadow-md min-h-screen bg-white mx-auto">
            <div class="flex justify-center items-center">
                <h1 class="mt-8 mb-4 text-3xl text-gray-900 font-medium">My Room</h1>
            </div>
            <h2 class="mx-4 my-2 text-xl text-gray-600 font-medium">Room Information</h2>
            <!-- gambar utama -->
            <div class="max-w-xl shadow-md min-h-screen bg-white mx-auto">
            <img id="main_image1" class="w-full h-64 px-1 rounded-md" src="/storage/{{ $rent->room->gambar_kamar }}" alt="">
            <br>
            <div class="flex overflow-x-scroll">
                <img class="thumbnail1 w-48 h-24 px-1 rounded-md" src="/storage/{{ $rent->room->gambar_kamar }}" alt="">
                @foreach($rent->room->facilities as $facility)
                    @if($facility->image)
                        <img class="thumbnail1 w-48 h-24 px-1 rounded-md" src="/storage/{{ $facility->image }}" alt="">
                    @endif
                @endforeach
                <img class="thumbnail1 w-48 h-24 px-1 rounded-md" src="/storage/{{ $rent->room->building->gambar_bangunan }}" alt="">
            </div>
            <script>
                $(document).ready(function() {
                    // Set gambar pertama dari daftar sebagai gambar utama saat halaman dimuat
                    let firstImageSrc = $('.thumbnail1').first().attr('src');
                    $('#main_image1').attr('src', firstImageSrc);

                    // Saat salah satu gambar dengan kelas 'thumbnail' diklik
                    $('.thumbnail1').on('click', function() {
                        let clickedImageSrc = $(this).attr('src');
                        $('#main_image1').attr('src', clickedImageSrc);
                    });
                });
            </script>

            <h1 class="px-4 my-6 text-2xl text-gray-900 font-medium">{{ $rent->room->building->unit_bangunan }}{{ $rent->room->no_kamar }} - {{ $rent->room->building->alamat_bangunan }}</h1>
            
            <div class="flex justify-between items-center mx-4 -mb-4">
                <p class="text-green-600 text-2xl font-medium w-60 ">Rp {{ number_format($rent->room->harga_kamar, 2, ',', '.') }}</p>
                <div class="flex items-center justify-center bg-gray-900 hover:bg-gray-600 rounded-2xl gap-1 w-16 px-2 py-1">
                    <button id="rate-button" class="flex items-center justify-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 64 64"><path fill="#ffc70f" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2z"/></svg>
                        <p class="text-white text-sm">{{ $avgRoomRate }}</p>
                    </button>
                </div>
                <div class="w-60 flex items-center justify-end">
                    <a href="{{ $rent->room->building->link_gmap }}" class="flex items-center justify-end" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2.2rem" height="2.2rem" viewBox="0 0 20 20">
                            <path fill="#e02424" d="M10 0a7.65 7.65 0 0 0-8 8c0 2.52 2 5 3 6s5 6 5 6s4-5 5-6s3-3.48 3-6a7.65 7.65 0 0 0-8-8m0 11.25A3.25 3.25 0 1 1 13.25 8A3.25 3.25 0 0 1 10 11.25" />
                        </svg>
                    </a>
                </div>
            </div>
            
            @if(!$hasRate)
                <form action="/myroom/rate" method="post"  id="rating-form">
                    @csrf
                    <div id="rating" class="flex justify-center pt-12 gap-4">
                        <svg data-star="1" class="w-16 h-16 text-gray-300 cursor-pointer hover:text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg data-star="2" class="w-16 h-16 text-gray-300 cursor-pointer hover:text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg data-star="3" class="w-16 h-16 text-gray-300 cursor-pointer hover:text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg data-star="4" class="w-16 h-16 text-gray-300 cursor-pointer hover:text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg data-star="5" class="w-16 h-16 text-gray-300 cursor-pointer hover:text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>

                    <input type="hidden" name="id_kamar" value="{{ $rent->id_kamar }}">

                    <input type="hidden" name="id_penyewa" value="{{ auth('tenant')->user()->id }}">

                    <input type="hidden" id="rating-value" name="rate" value="0">

                    <div class="flex justify-center px-4 mt-2">
                        <textarea name="commentary" id="rate-commentary" class="w-full rounded-md min-h-36 max-h-72 p-2" placeholder="How was your experience?" style="display: none;" required></textarea>
                    </div>


                    <div class="mx-4 mt-2">
                        <button type="submit" id="submit-button" disabled style="display: none;" class="mr-auto mb-4 py-2 px-6 rounded-md text-white text-sm font-medium bg-primary-500 hover:bg-primary-400">Save</button>
                    </div>
                    <script>
                        $(document).ready(function() {
                            let selectedRating = 0;

                            $('#rating svg').click(function() {
                                let rating = $(this).data('star');

                                if (rating === selectedRating) {
                                    // Unselect rating if the same star is clicked
                                    selectedRating = 0;
                                    $('#rating-value').val(0);
                                    $('#rating svg').removeClass('text-yellow-400').addClass('text-gray-300');
                                    $('#rate-commentary').hide();
                                    $('#submit-button').hide().attr('disabled', true);
                                } else {
                                    // Set the new rating
                                    selectedRating = rating;
                                    $('#rating-value').val(rating);

                                    // Highlight stars up to the selected rating
                                    $('#rating svg').each(function() {
                                        $(this).toggleClass('text-yellow-400', $(this).data('star') <= rating)
                                            .toggleClass('text-gray-300', $(this).data('star') > rating);
                                    });

                                    // Show the textarea and button
                                    $('#rate-commentary').show();
                                    $('#submit-button').show().removeAttr('disabled');
                                }
                            });
                        });
                    </script>
                </form>
            @else
                <br>
            @endif
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
            
            <h2 class="mx-4 my-2 text-xl text-gray-600 font-medium">Rental Information</h2>
            <div class="mx-4 mt-4 text-gray-600">
                <div class="flex mb-6">
                    <label class="w-72">ID</label>
                    <p>{{ $rent->room->building->owner_id.$rent->room->id_bangunan.$rent->id_kamar.$rent->id_penyewa.$rent->id}}</p>
                </div>
                <div class="flex mb-6">
                    <label class="w-72">Tenant Name</label>
                    <p>{{ $rent->tenant->name }}</p>
                </div>
                <div class="flex mb-6">
                    <label class="w-72">Room</label>
                    <p>{{ $rent->room->building->unit_bangunan.$rent->id_penyewa }}</p>
                </div>
                <div class="flex mb-6">
                    <label class="w-72">Address</label>
                    <p>{{ $rent->room->building->alamat_bangunan }}</p>
                </div>
                <div class="flex mb-6">
                    <label class="w-72">Entry Date</label>
                    <p>{{ $rent->tanggal_masuk }}</p>
                </div>
                <div class="flex mb-6">
                    <label class="w-72">Exit Date</label>
                    <p>{{ $rent->tanggal_keluar }}</p>
                </div>
                <div class="flex mb-6">
                    <label class="w-72">Rental proof</label>
                    <a href="/myroom/download-proof/{{ $rent->doc }}">download</a>
                </div>
                <div class="flex">
                    <label class="w-72">Ends At</label>
                </div>
            </div>
            <div class="flex justify-center mb-2">
                <div id="countDownDayArea">
                    <span class="text-4xl font-medium text-gray-900" id="countDownDayPublic"></span>
                    <small>days</small>
                </div>
            </div>

            <div class="flex justify-center">
                <span class="text-lg text-gray-900" id="countDownTimePublic"></span>
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
                        $('#countDownDayPublic').addClass('px-2 bg-red-600 text-white');
                      }
                      if (distance < 0) {
                        clearInterval(countdownInterval);
                        $('#countDownTimePublic').text("The rental has expired");
                        $('#countDownTimePublic').addClass("text-red-600");
                        $('#countDownDayArea').addClass("hidden");
                        $('#rent-again-form').removeClass("hidden");
                        $('#discard-form').removeClass("hidden");
                    }
                    }, 1000);
                  });
                </script>
            <br>
            <form id="rent-again-form" method="post" class="hidden" action="/checkout">
                @csrf
                <input type="hidden" name="room_id" value="{{ $rent->room->id_kamar }}">
                <input type="hidden" name="tenant_id" value="{{ auth('tenant')->user()->id }}">
                <input type="hidden" name="price" value="{{ $rent->room->harga_kamar }}">
                <div class="flex justify-center px-52">
                    <button type="submit" id="rent-again-button" class="mb-4 w-full rounded-md min-w-28 bg-primary-500 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Rent again</button>
                </div>
            </form>
            <form id="discard-form" action="/discard/{{ $rent->token }}" class="hidden">
                @csrf
                <input type="hidden" name="id_kamar" value="{{ $rent->room->id }}">
                <input type="hidden" name="id_penyewa" value="{{ auth()->user()->id }}">
                <div class="flex justify-center px-52">
                    <button type="button" id="discard-button" class="mb-6 w-full rounded-md min-w-28 border-2 border-red-600 py-1.5 text-sm font-semibold leading-6 text-red-600 shadow-sm hover:bg-red-600 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-400">Discard</button>
                </div>
            </form>
        </div>
    @else
        <div class="pt-20 max-w-xl shadow-md min-h-screen bg-white mx-auto">
            <h1 class=" text-center text-xl text-gray-500 font-medium" >The room you rented is displayed here.</h1> 
        </div>
    @endif
</x-public-layout>