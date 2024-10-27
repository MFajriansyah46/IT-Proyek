<x-layout>
    <h1 class="my-8 text-5xl font-bold text-gray-800">Active Rentals</h1>

    <x-table.header :headers="['Tenant', 'Room', 'total payment','payment status']">
        @foreach ($transactions as $i=>$transaction)
            <tr class="hover:bg-yellow-200">
                <x-table.data class="text-center">{{$i+1}}</x-table.data>

                <x-table.data>{{ $transaction->tenant->name }}</x-table.data>
                <x-table.data>{{ $transaction->room->building->unit_bangunan }}{{ $transaction->room->no_kamar }} - {{ $transaction->room->building->alamat_bangunan }}</x-table.data>
                <x-table.data>Rp {{ number_format($transaction->room->harga_kamar, 2, ',', '.') }} </x-table.data>
                <x-table.data>
                    @if($transaction->lunas) 
                        <p class="font-medium w-20 text-sm text-center">Settled </p>
                    @else
                        <a href="/confirm/payment/{{ $transaction->snap_token }}">
                            <div class="border- border-opacity-40 bg-orange-300 font-medium rounded-xl w-20 text-sm text-gray-800 text-center cursor-pointer">Pending</div>
                        </a>
                    @endif
                </x-table.data>
            </tr>
        @endforeach
    </x-table.header>

</x-layout>