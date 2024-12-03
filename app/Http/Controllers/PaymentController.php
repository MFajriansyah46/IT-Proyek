<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Rate;
use App\Models\Rent;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function detail()
    {

        $remember_token = $_GET['r'];

        $room = Room::where('remember_token', $remember_token)->first();

        if(auth('tenant')->user()){
            $rent = Rent::where('id_penyewa',auth('tenant')->user()->id)->first();
            return view('roomDetail', ['room' => $room , 'rent' => $rent]);
        } else {

            $rent = Rent::where('id_penyewa', $room->id_penyewa)->first();
            return view('roomDetail', ['room' => $room , 'rent' => $rent]);
        }
    }

    public function pay(Request $request)
    {

        $transaction = new Transaction;
        $transaction->room_id = $request->room_id;
        $transaction->tenant_id = $request->tenant_id;
        $transaction->price = $request->price;
        $transaction->status = false;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $price = $request->price;
        
        if($countRoommate = auth('tenant')->user()->roommate()->count()){
            $price = $price + 25000*$countRoommate;
        }

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $price,
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

    public function rent( $snap_token, Request $request) {

        if(isset($_GET['user'])){
            $tenant_id = $_GET['user'];
        }
        else {
            $tenant_id = $request->tenant_id;
        }
        $transaction = Transaction::where('snap_token',$snap_token)->first();
        $transaction->status = true;
        $transaction->update();

        if($transaction->status) {

            $rent = Rent::firstWhere('id_penyewa',$tenant_id);
            if($rent){
                $rent->tanggal_keluar = null;
                $rent->id_kamar = $transaction->room_id;
                $rent->id_penyewa = $transaction->tenant_id;
                $rent->tanggal_masuk = now('Asia/Makassar');
                $rent->token = Str::random(16);
                $rent->update();

            } else {
                $rent = new Rent();
                $rent->id_kamar = $transaction->room_id;
                $rent->id_penyewa = $transaction->tenant_id;
                $rent->tanggal_masuk = now('Asia/Makassar');
                $rent->token = Str::random(16);
                $rent->save();
            }
        }

        if(auth('tenant')->user()){
            return redirect('/myroom')->with('success','Payment Successfull!');
        } else if( auth('owner')->user()) {
            return redirect('/transactions');
        }
    }

    public function rate(Request $request) {
        
        $rating = new Rate;
        $rating->id_kamar = $request->id_kamar;
        $rating->id_penyewa = $request->id_penyewa;
        $rating->rate = $request->rate;
        $rating->commentary = $request->commentary;
        $rating->save();
        return redirect('/myroom');
    }

    public function confirmation($snap_token){
        $transaction = Transaction::where('snap_token',$snap_token)->first();
        $transaction->status = true;
        $transaction->update();

        if($transaction->status) {
            $rent = new Rent();
            $rent->id_kamar = $transaction->room_id;
            $rent->id_penyewa = $transaction->tenant_id;
            $rent->tanggal_masuk = now('Asia/Makassar');
            $rent->token = Str::random(16);
            $rent->save();
        }
        return redirect('/transactions')->with('payment-success','Payment Confirmed');
    }
} 