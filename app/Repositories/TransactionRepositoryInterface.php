<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Collection;

interface TramsactionRepositoryInterface{
    public function findBookingId(string $bookingId);
    public function create(array $data);
    public function getUserTransaction(int $userId);
}