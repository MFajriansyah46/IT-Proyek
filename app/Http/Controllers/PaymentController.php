<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Rent;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function detail()
    {

        $token = $_GET['r'];

        $room = Room::where('token', $token)->first();
        // $rent = Rent::where('id_penyewa',auth('tenant')->user()->id)->first();
        // dd(auth('tenant')->user()->id);

        if(auth('tenant')->user()){
            $rent = Rent::where('id_penyewa',auth('tenant')->user()->id)->first();
            return view('roomDetail', ['room' => $room , 'rent' => $rent]);
        } else {

            $rent = Rent::where('id_penyewa', $room->id_penyewa)->first();
            return view('roomDetail', ['room' => $room , 'rent' => $rent]);
        }
    }

    public function process(Request $request)
    {

        $transaction = new Transaction;
        $transaction->id_kamar = $request->id_kamar;
        $transaction->id_penyewa = $request->id_penyewa;
        $transaction->biaya = $request->biaya;
        $transaction->lunas = false;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->biaya,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction->snap_token = $snapToken;

        $transaction->save();

        return Redirect("/checkout/$transaction->snap_token");
    }

    public function checkout($snap_token){

        $transaction = Transaction::where('snap_token',$snap_token)->first();

        return view('checkout',['transaction' => $transaction]);
    }

    public function rent($snap_token) {

        $transaction = Transaction::where('snap_token',$snap_token)->first();
        $transaction->lunas = true;
        $transaction->update();

        if($transaction->lunas) {

            $rent = new Rent();
            $rent->id_kamar = $transaction->id_kamar;
            $rent->id_penyewa = $transaction->id_penyewa;
            $rent->tanggal_masuk = now('Asia/Makassar');
            $rent->token = Str::random(16);
            $rent->save();
        }
        return redirect('/')->with('payment-success','Payment Successfull! Check your room now.');
    }
}