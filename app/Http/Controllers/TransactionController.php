<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use App\Services\PaymentService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
  protected $courseServices;
  protected $paymentServices;
  protected $transactionServices;

  public function __construct(CourseService $courseServices, PaymentService $paymentServices, TransactionService $transactionServices)
  {
    $this->courseServices = $courseServices;
    $this->paymentServices = $paymentServices;
    $this->transactionServices = $transactionServices;
  }

  // User
  public function index()
  {
    $userAuth = Auth::user();
    $data = $this->paymentServices->getPaidCourses($userAuth->id);
    $firstSectionId = $data->first()?->course?->courseSections?->first()?->id ?? null;
    $firstContentId = $data->first()?->course?->courseSections?->first()?->sectionContents?->first()?->id ?? null;
    return view('user.home.index', compact(['data', 'firstSectionId', 'firstContentId']));
  }

  public function checkouts($slug)
  {
    $user = Auth::user();
    $course = Course::where('slug', $slug)->first();
    if (!$course) {
      abort(404, 'Course not found');
    }

    $price = $course->price;
    $discount = $course->diskon_price ?? 0;
    $calculate = $price - $discount;
    $sub_total = $calculate > 0 ? $calculate : $price;

    $tax = 0.11;
    $total_tax_price = $sub_total * $tax;
    $total_amount = $sub_total + $total_tax_price;

    $type_products = 'Courses';
    session()->put('id_products', $course->id);

    $data = compact(
      'sub_total',
      'total_tax_price',
      'total_amount',
      'course',
      'user',
      'type_products'
    );
    return view('user.courses.checkout', $data);
  }

  public function historyCheckouts()
  {
    $data = $this->transactionServices->getTransactions();
    return view('user.subscriptions.index', compact('data'));
  }

  // Handle Midtrans Payment
  public function paymentMidtrans()
  {
    try {

      $courseId = session()->get('id_products');

      if (!$courseId) {
        return response()->json(['error' => 'No Course Id data found in session.'], 400);
      }

      $snapToken = $this->paymentServices->createPayment($courseId);
      if (!$snapToken) {
        return response()->json(['error' => 'Failed to create Midtrans transaction.'], 500);
      }

      return response()->json(['snap_token' => $snapToken], 200);

    } catch (\Exception $e) {
      return response()->json(['error' => 'Payment failed: ' . $e->getMessage()], 500);
    }
  }

  public function handlePaymentNotification(Request $request)
  {
    try {
      $transactionStatus = $this->paymentServices->handlePaymentNotification();
      if (!$transactionStatus) {
        return response()->json(['error' => 'invalid notification data.'], 400);
      }
      return response()->json(['staus' => $transactionStatus]);

    } catch (\Exception $e) {
      Log::error('Failed to handle midtrans notification: ', ['error' => $e->getMessage()]);
      return response()->json(['error' => 'Failed to process notification'], 500);
    }
  }
}
