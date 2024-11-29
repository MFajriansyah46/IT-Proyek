<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Rent;
use App\Models\Tenant;
use Illuminate\Support\Carbon;

class CheckNotification extends Command
{
    protected $signature = 'rental:check-notification';
    protected $description = 'Periksa notifikasi penyewaan';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $rents = Rent::with(['tenant', 'room.building'])
            ->where('tanggal_keluar', '>', now())
            ->where('tanggal_keluar', '<=', now()->addDays(30))
            ->get();

        foreach ($rents as $rent) {
            if ($rent->tenant->phone_number) {
            // Hitung sisa waktu
            $tanggalKeluar = Carbon::parse($rent->tanggal_keluar);
            $now = now();
            $days = floor($now->floatDiffInDays($tanggalKeluar)); // Menggunakan floor() untuk membulatkan ke bawah

            $message = "Halo {$rent->tenant->name},\n"
            . "Ini adalah pesan pengingat otomatis Kos Bang Raja\n\n"
            . "Detail Kamar Anda : \nSewa kamar {$rent->room->building->unit_bangunan}{$rent->room->no_kamar}"
            . " - {$rent->room->building->alamat_bangunan}, "
            . "akan berakhir dalam {$days} hari. \nSilakan perpanjang sewa Anda jika ingin melanjutkan.\n\n"
            . "Tanggal Masuk: " . date('d-m-Y', strtotime($rent->tanggal_masuk)) . "\n"
            . "Tanggal Keluar: " . date('d-m-Y', strtotime($rent->tanggal_keluar)) . "\n\n\n"
            . "Terima kasih.";
                $this->sendWhatsAppNotification($rent->tenant->phone_number, $message);
                $this->info("Berhasil mengirim pengingat ke {$rent->tenant->name}");
            }
        }
    }

    private function sendWhatsAppNotification($phone, $message)
    {
        try {
            $curl = curl_init();

            $phone = preg_replace('/[^0-9]/', '', $phone);
            if (substr($phone, 0, 1) === '0') {
                $phone = '62' . substr($phone, 1);
            }

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => array(
                    'target' => $phone,
                    'message' => $message,
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ' . env('FONNTE_TOKEN'),
                ),
            ));

            curl_exec($curl);
            curl_close($curl);
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}
