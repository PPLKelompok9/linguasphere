@extends('user.layouts.layouts')
@section('content')
  <main class="pb-10 mt-[30px]">
    <section class="pl-[calc(((100%-1280px)/2)+75px)] pr-[calc(((100%-1280px)/2)+75px)]">
    <main class="flex flex-1 justify-center items-center">
      <div class="flex w-[1000px] !h-fit rounded-[20px] border border-obito-grey gap-[40px] bg-white items-center p-5">
      <form id="checkout-details" method="POST" class="w-full flex flex-col gap-5">
        @csrf
        <input type='text' hidden name='payment_method' value='midtrans'>
        <h1 class="font-bold text-[22px] leading-[33px]">Checkout Confirmation</h1>
        <section id="give-access-to" class="flex flex-col gap-2">
        <h2 class="font-semibold">User Information</h2>
        <div class="profile flex items-center gap-[14px] rounded-[20px] border border-obito-grey p-[14px]">
          <div class="flex justify-center items-center overflow-hidden size-[50px] rounded-full">
          <img src="{{ asset('storage/' . $user->photo) }}" class="w-full h-full object-cover" alt="profile">
          </div>
          <h3 class="font-semibold">{{ $user->name }}</h3>
        </div>
        </section>
        <section id="transaction-details" class="flex flex-col gap-[12px]">
        <h2 class="font-semibold">Transaction Details</h2>
        <div class="flex flex-col gap-[12px]">
          <div class="flex items-center justify-between">
          <h1>Price</h1>
          <strong class="font-semibold">Rp{{ number_format($course->price, 0, '', '.') }}</strong>
          </div>
          <div class="flex items-center justify-between">
          <h1>Diskon</h1>
          <strong class="font-semibold">Rp{{ number_format($course->diskon_price, 0, '', '.') }}</strong>
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
          <strong class="font-semibold">Rp{{ number_format($total_tax_price, 0, '', '.') }}</strong>
          </div>
          <div class="flex items-center justify-between">
          <div class="flex items-center gap-2">
            <p class="whitespace-nowrap">Grand Total</p>
          </div>
          <strong
            class="font-bold text-[22px] leading-[33px] text-obito-green">Rp{{ number_format($total_amount, 0, '', '.') }}</strong>
          </div>
        </div>
        </section>
        <div class="grid grid-cols-2 gap-[14px]">
        <a href="{{ route('courses.detail', $course['slug'])}}">
          <div
          class="flex border border-obito-grey rounded-full items-center justify-center py-[10px] hover:border-obito-green transition-all duration-300">
          <p class="font-semibold">Cancel</p>
          </div>
        </a>
        <button id="payment-button" type="submit"
          class="flex text-white bg-obito-green rounded-full items-center justify-center py-[10px] hover:drop-shadow-effect transition-all duration-300">
          <p class="font-semibold">Pay Now</p>
        </button>
        </div>
        <hr class="border-obito-grey" />
      </form>
      <div id="benefits" class="bg-[#F8FAF9] rounded-[20px] overflow-hidden shrink-0 w-[420px]">
        <section id="thumbnails"
        class="relative flex justify-center h-[250px] items-center overflow-hidden rounded-t-[14px] w-full">
        <img src="{{ Storage::url($course->cover) }}" alt="course cover" class="size-full object-cover" />
        </section>
        <section id="points" class="pt-[61px] relative flex flex-col gap-4 px-5 pb-5">
        <div
          class="card absolute -top-[47px] left-[30px] right-[30px] flex items-center p-4 gap-[14px] border border-obito-grey rounded-[20px] bg-white shadow-[0px_10px_30px_0px_#B8B8B840]">
          <div>
          <h3 class="font-bold text-[18px] leading-[27px]">{{ $course->name }}</h3>
          <p class="text-obito-text-secondary">{{ $course->level }}</p>
          </div>
        </div>
        <div class="flex items-center gap-2">
          <p class="font-semibold text-justify">{{ $course->description }}</p>
        </div>
        </section>
      </div>
      </div>
    </main>
    </section>
  </main>
@endsection

@push('after-scripts')
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.clientKey') }}"></script>
  <script type="text/javascript">
    const paymentButton = document.getElementById('payment-button');
    paymentButton.addEventListener('click', function (e) {
    e.preventDefault();
    fetch('{{ route('transaction.payment_midtrans') }}', {
      method: "POST",
      headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
      },
      body: JSON.stringify({})
    })
      .then(response => response.json())
      .then(data => {
      if (data.snap_token) {
        snap.pay(data.snap_token, {
        onSuccess: function (result) {
          window.location.href = "{{ route('user.checkout_success') }}";
        },
        onPending: function (result) {
          alert('Payment pending !');
          window.location.href = "{{route('courses.user')}}"
        },
        onError: function (result) {
          alert('Payment failed: ' + result.status_message);
          window.location.href = "{{ route('courses.user') }}"
        },
        onClose: function () {
          alert('Payment popup closed');
          window.location.href = "{{ route('courses.user') }}"
        }
        });
      } else {
        alert('Error: ' + data.error)
      }
      })
      .catch(error => {
      console.error('Error: ', error);
      });
    });

  </script>

@endpush