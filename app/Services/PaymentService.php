<?php

namespace App\Services;

use App\Helpers\TransactionHelper;
use App\Models\Course;
use App\Repositories\TransactionRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentService{

    protected $midtransService;
    protected $transactionService;
    protected $courseService;

    public function __construct(TransactionRepositoryInterface $transactionService, CourseRepositoryInterface $courseService, MidtransService $midtransService){
        $this->transactionService = $transactionService;
        $this->courseService = $courseService;
        $this->midtransService = $midtransService;
    }

    public function createPayment(int $courseId){
        $user = Auth::user();
        $course = $this->courseService->findById($courseId);
        $price = $course->diskon_price && $course->diskon_price > 0 ? $couse->diskon_price : $couse->price;
        $tax = 0.11;
        $sub_total = $price;
        $total_tax_price = $price * $tax;
        $total_amount =   $sub_total + $total_tax_price;

        $params = [
            'transaction_details' => [
                'order_id' => TransactionHelper::generateUniqueId(),
                'gross_amount' => (int) $total_amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'items_details' => [
                [
                    'id' => $course->id,
                    'price' => (int) $price,
                    'quantity' => 1,
                    'name' => $course->name,
                ],
                [
                    'id' => 'tax',
                    'price' => (int) $total_tax_price,
                    'quantity' => 1,
                    'name' => 'PPN 11%',
                ],
                'custom_field1' => $user->id,
                'custom_filed2' => $courseId,
            ]
        ];

        return $this->midtransService->createSnapToken($params);

    }

    public function handlePaymentNofification(){
        $notification = $this->midtransService->handleNotification();
        if(in_array($notification['transaction_status'], ['capture','settlement'])){
            $course = $this->courseService->findById($notification['custom_field2']);
            $this->createTransaction($notification, $course);
        }

        return $notification['transaction_status'];
    }

    public function createTransaction(array $notification, Course $course){
        $transactionData = [
            'id_user' => $notification['custom_field1'],
            'id_products' => $notification['custom_field2'],
            'id_agency' => $couse->id_agency,
            'total_price' => $notification['gross_amount'],
            'type_payment' => 'Midtrans',
            'type_products' => 'Course',
            'status_payment' => 'Paid',

        ];

        $this->transactionService->create($transactionData);
        Log::info('Transaction successfully created: ' . $notification['order_id']);
    }
}
