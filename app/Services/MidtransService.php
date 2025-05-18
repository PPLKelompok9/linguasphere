<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;

class MidtransService{
    public function __construct(){
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction  = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }

    public function createSnapToken(array $params): string{
        try{
            return Snap::getSnapToken($params);
        }catch(\Exception $e){
            Log::error('Failed to create snap token'. $e->getMessage());
            throw $e;
        }
    }

    public function handleNotification(): array{
        try{
            $notification = new Notification();
            return [
                "order_id" => $notification->order_id,
                "transaction_status" => $notification->transaction_status,
                "gross_amount" => $notification->gross_amount,
                "custom_field1" => $notification->custom_field1,
                "custom_field2" => $notification->custom_field2,

            ];
        }catch(\Exception $e){
            Log::error('Midtrans Notification errors'. $e->getMessage());
            throw $e;
        }
    }
}