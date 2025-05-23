<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Collection;

class TransactionRepository implements TransactionRepositoryInterface{
    public function findBookingId(string $bookingId){
        return Transaction::where('booking_id', $bookingId)->first();
    }

    public function create(array $data){
        return Transaction::create($data);
    }

    public function getTransaction(int $userId){
        return Transaction::with('course')->where('id_user', $userId)->orderBy('created_at', 'desc')->get();
    }
}