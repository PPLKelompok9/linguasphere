<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Course;
use App\Repositories\TransactionRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TransactionService
{
  protected $transactionRepository;
  protected $coursesRepository;


  public function __construct(
    TransactionRepositoryInterface $transactionRepository,
    CourseRepositoryInterface $coursesRepository
  ) {
    $this->transactionRepository = $transactionRepository;
    $this->courseRepository = $coursesRepository;
  }
  //Show data on page detail-transactions
  public function validationCheckouts(Course $course)
  {
    $user = Auth::user();
    $price = $course->diskon_price && $course->diskon_price > 0 ? $course->diskon_price : $course->price;
    $type_products = 'Courses';
    $tax = 0.11;
    $sub_total = $price;
    $total_tax_price = $price * $tax;
    $total_amount = $sub_total + $total_tax_price;

    session()->put('id_products', $course->id);

    return compact(
      'sub_total',
      'total_tax_price',
      'total_price',
      'course',
      'user',
      'type_products'
    );
  }

  public function getRecentCourse()
  {
    $courseId = session()->get('id_products');
    // return Course::find('id_products');
    return $this->courseRepository->findById($courseId);
  }

  public function getTransactions()
  {
    $user = Auth::user();

    return $this->transactionRepository->getTransaction($user->id);
  }

  public function getTransactionDetail($transactionId, $userId)
  {
    return Transaction::with('course')
      ->where('id', $transactionId)
      ->where('id_user', $userId)
      ->first();
  }
}
