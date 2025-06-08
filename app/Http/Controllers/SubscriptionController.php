<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\CourseService;
use App\Services\PaymentService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
  protected $transactionServices;


  public function __construct(TransactionService $transactionServices)
  {
    $this->transactionServices = $transactionServices;
  }

  public function subscriptionDetail($transactionId)
  {
    $transaction = Transaction::with(['course', 'user'])
      ->where('id', $transactionId)
      ->where('id_user', auth()->id())
      ->firstOrFail();

    $basePrice = $transaction->course->price - $transaction->course->diskon_price;
    $ppn = $basePrice * 0.11;
    $grandTotal = $basePrice + $ppn;

    return view('user.subscriptions.detail', [
      'transaction' => $transaction,
      'course' => $transaction->course,
      'user' => $transaction->user,
      'basePrice' => $basePrice,
      'ppn' => $ppn,
      'grandTotal' => $grandTotal,
    ]);
  }
}
