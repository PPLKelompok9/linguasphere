<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use App\Services\PaymentService;
// use App\Services\TransactionService;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExternalController extends Controller
{

    protected $courseServices;
    protected $transactionServices;

    public function __construct(CourseService $courseServices, PaymentService $paymentServices){
        $this->courseServices = $courseServices;
        $this->paymentServices = $paymentServices;
    }

    public function checkouts(int $id){
        $user = Auth::user();
        $course = Course::find($id);  
        if(!$course){
            abort(404, 'Course not found');
        }
        $price = $course->diskon_price && $course->diskon_price > 0 ? $course->diskon_price : $course->price;
        $type_products = 'Courses';
        $tax = 0.11;
        $sub_total = $price;
        $total_tax_price = $price * $tax;
        $total_amount =   $sub_total + $total_tax_price;
        session()->put('id_products', $course->id);       

        $data = compact('sub_total',
            'total_tax_price',
            'total_amount',
            'course',
            'user',
            'type_products');
        return view('front.checkout', $data);
    }

    public function paymentMidtrans(){
        try{

            $courseId = session()->get('id_products');

            if(!$courseId){
                return response()->json(['error' => 'No Course Id data found in session.'], 400);
            }

            $snapToken = $this->paymentServices->createPayment($courseId);
            if(!$snapToken){
                return response()->json(['error' => 'Failed to create Midtrans transaction.'], 500);
            }

            return response()->json(['snap_token' => $snapToken], 200);

        }catch(\Exception $e){
            return response()->json(['error'=>'Payment failed: '.$e->getMessage()], 500);
        }
    }

    public function path()
    {
        return view('external.path');
    }


}