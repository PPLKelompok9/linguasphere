<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use App\Services\PaymentService;
use App\Services\TransactionService;
use App\Models\Course;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExternalController extends Controller
{

  protected $paymentServices;


  public function __construct(PaymentService $paymentServices)
  {
    $this->paymentServices = $paymentServices;
  }

  public function index()
  {
    $userAuth = Auth::user();
    $data = $this->paymentServices->getPaidCourses($userAuth->id);
    $firstSectionId = $data->first()?->course?->courseSections?->first()?->id ?? null;
    $firstContentId = $data->first()?->course?->courseSections?->first()?->sectionContents?->first()?->id ?? null;
    return view('user.home.index', compact(['data', 'firstSectionId', 'firstContentId']));
  }


}