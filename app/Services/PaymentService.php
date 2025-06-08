<?php

namespace App\Services;

use App\Helpers\TransactionHelper;
use App\Models\Course;
use App\Repositories\TransactionRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentService
{

  protected $midtransService;
  protected $transactionService;
  protected $courseService;

  public function __construct(CourseRepositoryInterface $courseService, MidtransService $midtransService, TransactionRepositoryInterface $transactionService)
  {
    $this->courseService = $courseService;
    $this->transactionService = $transactionService;
    $this->midtransService = $midtransService;
  }

  public function createPayment(int $courseId)
  {


    $user = Auth::user();
    $course = $this->courseService->findById($courseId);

    $price = $course->price;
    $discount = $course->diskon_price ?? 0;
    $calculate = $price - $discount;
    $tax = 0.11;
    $calculateTax = $calculate * $tax;
    $total_amount = $calculate + $calculateTax;
    Log::info('Creating payment for course ID: ' . $courseId . ' with total amount: ' . $total_amount);

    $params = [
      'transaction_details' => [
        'order_id' => TransactionHelper::generateUniqueId(),
        'gross_amount' => (int) $total_amount,
      ],
      'customer_details' => [
        'first_name' => $user->name,
        'email' => $user->email,
      ],
      'item_details' => [
        [
          'id' => $course->id,
          'price' => (int) $calculate,
          'quantity' => 1,
          'name' => $course->name,
        ],
        [
          'id' => 'tax',
          'price' => (int) $calculateTax,
          'quantity' => 1,
          'name' => 'PPN 11%',
        ],
      ],
      'custom_field1' => $user->id,
      'custom_field2' => $courseId,
    ];

    return $this->midtransService->createSnapToken($params);

  }

  public function handlePaymentNotification()
  {
    $notification = $this->midtransService->handleNotification();
    if (in_array($notification['transaction_status'], ['capture', 'settlement'])) {
      $course = Course::findOrFail($notification['custom_field2']);
      //$course = $this->courseService->findById($notification['custom_field2']);
      $this->createTransaction($notification, $course);
    }

    return $notification['transaction_status'];
  }

  public function getPaidCourses(int $id)
  {
    return $this->transactionService->paidCourses($id);
  }

  public function getRecentCourse()
  {
    $courseId = session()->get('id_products');
    return Course::find($courseId);
  }

  public function createTransaction(array $notification, Course $course)
  {
    $transactionData = [
      'id_user' => $notification['custom_field1'],
      'id_products' => $notification['custom_field2'],
      'id_agency' => $course->id_agency,
      'total_price' => $notification['gross_amount'],
      'type_payment' => 'Midtrans',
      'type_products' => 'Course',
      'status_payment' => 'Paid',

    ];

    $this->transactionService->create($transactionData);
    Log::info('Transaction successfully created: ' . $notification['order_id']);
  }
}
