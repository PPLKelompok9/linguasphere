@extends('front.layouts.layouts')
@section('content')
  <main class="relative flex flex-1 h-full">
    <div id="background-banner" class="absolute flex w-1/2 shrink-0 h-[56.3rem] overflow-hidden right-0">
    <img src="{{asset('assets/images/backgrounds/banner-subscription.jpg')}}" class="w-full h-full object-cover"
      alt="banner">
    </div>
    <section id="subscriptions-list"
    class="relative flex flex-col gap-5 mt-[50px] w-full max-w-[1280px] px-[75px] py-5 mx-auto">
    <h1 class="font-bold text-[28px] leading-[42px]">My Courses</h1>
    <div id="list-container" class="flex flex-col gap-5 max-w-[1000px] w-full">
      @foreach ($data as $transaction)
      <div
      class="subscription-card bg-white border border-obito-grey flex items-center justify-between rounded-[20px] py-5 px-4 gap-8">
      <div class="flex items-center flex-1 gap-[14px]">
      <div class="flex shrink-0 size-[50px]">
      <img src="/assets/images/icons/cup-green-fill.svg" class="flex shrink-0 size-[50px]" alt="icon">
      </div>
      <div>
      <p class="font-bold text-lg overflow-hidden line-clamp-2">{{ $transaction->course->name }}</p>
      <p class="text-obito-text-secondary">Life Time</p>
      </div>
      </div>
      <div class="flex flex-col w-[100px] shrink-0 gap-1">
      <div class="flex items-center gap-1">
      <p class="text-sm">Price</p>
      </div>
      <p class="font-semibold text-sm">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
      </div>
      <div class="flex flex-col w-[150px] shrink-0 gap-1">
      <div class="flex items-center gap-1">
      <p class="text-sm">Type Payment</p>
      </div>
      <p class="font-semibold text-sm">{{ $transaction->type_payment }}</p>
      </div>
      <div class="flex flex-col w-[150px] shrink-0 gap-1">
      <div class="flex items-center gap-1">
      <p class="text-sm">Status Payment</p>
      </div>
      <p class="font-semibold text-sm capitalize">{{ $transaction->status_payment }}</p>
      </div>
      <a href="{{ route('user.subscriptions.detail', $transaction->id) }}"
      class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
      <span class="font-semibold">Details</span>
      </a>
      </div>
    @endforeach
    </div>
    </section>
  </main>
@endsection