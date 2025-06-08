@extends('front.layouts.layouts')
@section('title', 'Checkout Success')
@section('content')
  <x-nav-auth :user="auth()->user()" />
  {{-- <nav id="bottom-nav" class="flex w-full bg-white border-b border-obito-grey py-[14px]">
    <ul class="flex w-full max-w-[1280px] px-[75px] mx-auto gap-3">
    <li class="group">
      <a href="#"
      class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
      <img src="assets/images/icons/home-trend-up.svg" class="flex shrink-0 w-5" alt="icon">
      <span>Overview</span>
      </a>
    </li>
    <li class="group">
      <a href="catalog-v2.html"
      class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
      <img src="assets/images/icons/note-favorite.svg" class="flex shrink-0 w-5" alt="icon">
      <span>Courses</span>
      </a>
    </li>
    <li class="group">
      <a href="#"
      class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
      <img src="assets/images/icons/message-programming.svg" class="flex shrink-0 w-5" alt="icon">
      <span>Quizzess</span>
      </a>
    </li>
    <li class="group">
      <a href="#"
      class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
      <img src="assets/images/icons/cup.svg" class="flex shrink-0 w-5" alt="icon">
      <span>Certificates</span>
      </a>
    </li>
    <li class="group">
      <a href="#"
      class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
      <img src="assets/images/icons/ruler&pen.svg" class="flex shrink-0 w-5" alt="icon">
      <span>Portfolios</span>
      </a>
    </li>
    </ul>
  </nav> --}}
  <main class="flex justify-center py-5 flex-1 items-center">
    <div class="w-[500px] flex flex-col gap-[30px]">
    <div class="flex flex-col gap-[10px]">
      {{-- <div class="rounded-full !w-fit mx-auto py-2 px-[14px] bg-obito-light-green flex items-center gap-[6px]">
      <img src="assets/images/icons/crown-green.svg" alt="icon" class="size-[20px] shrink-0" />
      <p class="font-bold text-sm leading-[21px]">Payment Successful</p>
      </div> --}}
      <h1 class="font-bold text-[28px] leading-[42px] text-center">Payment Successful</h1>
      <p class="text-center leading-[28px] text-obito-text-secondary">Anda telah berhasil memiliki kursus bahasa ini,
      Selamat Belajar </p>
    </div>
    <section id="card"
      class="relative rounded-[20px] border border-obito-grey p-[10px] flex items-center gap-4 bg-white">
      <div class="flex items-center justify-center rounded-[14px] overflow-hidden w-[180px] h-[130px]">
      <img src="{{ Storage::url($data->cover) }}" alt="image" class="w-full h-full object-cover" />
      </div>
      <div class="flex flex-col gap-[10px]">
      <h2 class="font-bold">
        Kursus : <br />
        {{ $data->name }}
      </h2>
      <div class="flex items-center gap-[6px]">
        <p class="text-obito-text-secondary text-sm leading-[21px]"> Tingkat: </p>
        <p>{{$data->level}}</p>
      </div>
      </div>
    </section>
    <div class="flex items-center gap-[14px] mx-auto">
      <a href="{{ route('external.history_checkouts') }}">
      <div
        class="flex items-center px-5 justify-center border border-obito-grey rounded-full py-[10px] bg-white hover:border-obito-green transition-all duration-300">
        <p class="font-semibold">My Courses</p>
      </div>
      </a>
      <a href="catalog-v2.html">
      <div
        class="flex items-center px-5 justify-center text-white rounded-full py-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
        <p class="font-semibold">Start Learning</p>
      </div>
      </a>
    </div>
    </div>
  </main>
@endsection