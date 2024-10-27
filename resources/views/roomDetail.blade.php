<x-public-layout>
    <div class="max-w-xl shadow-md h-screen bg-white mx-auto"> 
        <br>
        <img class="w-full h-64" src="/storage/{{ $room->gambar_kamar }}" alt="">
        <br><br>
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
                <p class="flex w-full justify-center rounded-md px-3 py-1.5 text-lg text-gray-600 font-semibold leading-6">You have already rented another room that hasn't expired yet.</p>
            @endif
        @else
            <a href="/login" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</a>
        @endauth
    </div>
</x-public-layout>