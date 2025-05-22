@extends('front.layouts.layouts')
@section('title', 'Confirmation Checkout')
@section('content')
        <x-nav-auth :user="$user" />
        <div id="path" class="flex w-full bg-white border-b border-obito-grey py-[14px]">
            <div class="flex items-center w-full max-w-[1280px] px-[75px] mx-auto gap-5">
                    <a href="#" class="last-of-type:font-semibold">Home</a>
                    <div class="h-10 w-px bg-obito-grey"></div>
                    <a href="pricing.html" class="last-of-type:font-semibold">Pricing Packages</a>
                    <span class="text-obito-grey">/</span>
                    <a href="#" class="last-of-type:font-semibold">Checkout Subscription</a>
            </div>
        </div>
        <main class="flex flex-1 justify-center py-5 items-center">
            <div class="flex w-[1000px] !h-fit rounded-[20px] border border-obito-grey gap-[40px] bg-white items-center p-5">
                <form id="checkout-details" method="POST" class="w-full flex flex-col gap-5">
                    @csrf
                    <input type='text' hidden name='payment_method' value='midtrans'>
                    <h1 class="font-bold text-[22px] leading-[33px]">Checkout Confirmation</h1>
                    <section id="give-access-to" class="flex flex-col gap-2">
                        <h2 class="font-semibold">User Information</h2>
                        <div class="flex items-center justify-between rounded-[20px] border border-obito-grey p-[14px]">
                            <div class="profile flex items-center gap-[14px]">
                                {{-- <div class="flex justify-center items-center overflow-hidden size-[50px] rounded-full">
                                    <img src="assets/images/photos/sami.png" alt="image" class="size-full object-cover" />
                                </div> --}}
                                <div class="desc flex flex-col gap-[3px]">
                                    <h3 class="font-semibold">{{ $user->name}}</h3>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="transaction-details" class="flex flex-col gap-[12px]">
                        <h2 class="font-semibold">Transaction Details</h2>
                        <div class="flex flex-col gap-[12px]">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p>Price</p>
                                </div>
                                <strong class="font-semibold">Rp{{number_format($course->price, 0, '', '.')}}</strong>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p>PPN</p>
                                </div>
                                <strong class="font-semibold">11%</strong>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p>Tax Price</p>
                                </div>
                                <strong class="font-semibold">Rp{{number_format($total_tax_price, 0, '', '.')}}</strong>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="whitespace-nowrap">Grand Total</p>
                                </div>
                                <strong class="font-bold text-[22px] leading-[33px] text-obito-green">Rp{{number_format($total_amount, 0, '', '.')}}</strong>
                            </div>
                        </div>
                    </section>
                    <div class="grid grid-cols-2 gap-[14px]">
                        <a href="pricing.html">
                            <div class="flex border border-obito-grey rounded-full items-center justify-center py-[10px] hover:border-obito-green transition-all duration-300">
                                <p class="font-semibold">Cancel</p>
                            </div>
                        </a>
                        <button id="payment-button" type="submit" class="flex text-white bg-obito-green rounded-full items-center justify-center py-[10px] hover:drop-shadow-effect transition-all duration-300">
                            <p class="font-semibold">Pay Now</p>
                        </button>
                    </div>
                    <hr class="border-obito-grey" />
                </form>
                <div id="benefits" class="bg-[#F8FAF9] rounded-[20px] overflow-hidden shrink-0 w-[420px]">
                    <section id="thumbnails" class="relative flex justify-center h-[250px] items-center overflow-hidden rounded-t-[14px] w-full">
                        <img src="{{ Storage::url($course->cover) }}" alt="image" class="size-full object-cover" />
                    </section>
                    <section id="points" class="pt-[61px] relative flex flex-col gap-4 px-5 pb-5">
                        <div class="card absolute -top-[47px] left-[30px] right-[30px] flex items-center p-4 gap-[14px] border border-obito-grey rounded-[20px] bg-white shadow-[0px_10px_30px_0px_#B8B8B840]">
                            <div>
                                <h3 class="font-bold text-[18px] leading-[27px]">{{$course->name}}</h3>
                                <p class="text-obito-text-secondary">{{$course->level}}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <p class="font-semibold">{{$course->description}}</p>
                        </div>
                    </section>
                </div>
            </div>
        </main>

@endsection
@push('after-scripts')
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
        <script type="text/javascript">
            const paymentButton = document.getElementById('payment-button');
            paymentButton.addEventListener('click', function(e){
                e.preventDefault();
                fetch('{{ route('external.payment_midtrans') }}',{
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({})
                })
                .then(response=>response.json())
                .then(data=> {
                    if(data.snap_token){
                        snap.pay(data.snap_token, {
                            onSuccess: function(result){
                                window.location.href="{{ route('external.checkout.success') }}";
                            },
                            onPending: function(result){
                                alert('Payment pending !');
                                window.location.href="{route('external.course')}"
                            },
                            onError: function(result){
                                alert('Payment failed: '+result.status_message);
                                window.location.href="{{ route('external.course') }}"
                            },
                            onClose: function(){
                                alert('Payment popup closed');
                                window.location.href="{{ route('external.course') }}"
                            }
                        });
                    }else{
                            alert('Error: '+data.error)
                    }
                })
                .catch(error=>{
                    console.error('Error: ',error);
                });
            });

        </script>

@endpush
