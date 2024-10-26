<x-public-layout>
  <div class="max-w-xl py-4 px-2 mt-20 shadow-md h-96 bg-white mx-auto">
    <h1 class=" text-2xl font-bold text-gray-800 mb-4 text-center">Checkout Payment</h1>
    <!-- Section Detail Penyewaan -->
    <h2 class="text-xl font-semibold text-gray-700 mb-2">Rental Details.</h2>
    <div class="mb-6">
        <div class="flex mb-2">
            <p class="text-gray-600 w-72"><strong>Room Number</strong></p>
            <p class="text-gray-600">: {{ $transaction->room->building->unit_bangunan }}{{ $transaction->room->no_kamar }}</p>
        </div>
        <div class="flex mb-2">
            <p class="text-gray-600 w-72"><strong>Address</strong></p>
            <p class="text-gray-600">: {{ $transaction->room->building->alamat_bangunan }}</p>
        </div>
        <div class="flex mb-2">
            <p class="text-gray-600 w-72"><strong>Duration</strong></p>
            <p class="text-gray-600">: 30 Days</p>
        </div>
        <div class="flex">
            <p class="text-gray-600 w-72"><strong>Total Harga</strong></p>
            <p class="text-gray-600">: Rp {{ number_format($transaction->room->harga_kamar, 2, ',', '.') }}</p>
        </div>
    </div>
    <button type="button" id="pay-button" class="mt-20 w-full bg-green-500 text-white font-semibold py-2 rounded-md hover:bg-green-600 transition duration-300">Confirm Payment</button>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $transaction->snap_token }}', {
          // Optional
          onSuccess: function(result){
            window.location.href= '/checkout/success/{{ $transaction->snap_token }}';
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
  </div>
</x-public-layout>
