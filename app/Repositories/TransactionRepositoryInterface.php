<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Collection;

interface TransactionRepositoryInterface{
    public function findBookingId(string $bookingId);
    public function create(array $data);
    public function getTransaction(int $userId);
    public function paidCourses(int $id);
}