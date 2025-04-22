@extends('layouts.homepage')

@section('title', 'Pretest')

@section('content')
  <section id="roadmap" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-4 mx-auto">
    <h2 class="font-bold text-[22px] leading-[33px]">Pretest</h2>
    <div class="grid grid-cols-2 gap-5">
    @foreach ($courses as $course)
    <section class="card" id="{{ $course->slug }}">
      <div
      class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
      <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="assets/thumbnails/LC_Paket_Intensive.webp" class="w-full h-full object-cover" alt="thumbnail">
      <p
      class="absolute flex m-[10px] bottom-0 w-[calc(100%-20px)] items-center gap-0.5 bg-white rounded-[14px] py-[6px] px-2">
      <img src="assets/icons/cup.svg" class="flex shrink-0 w-5" alt="icon">
      <span class="font-semibold text-xs leading-[18px]">Featured In AI Industry Digital</span>
      </p>
      </div>
      <div class="flex flex-col gap-3">
      <h3 class="font-bold text-lg line-clamp-2">Paket Intensive 1 bulan</h3>
      <p class="flex items-center gap-[6px]">
      <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
      <span class="text-sm text-obito-text-secondary">{{ $course->level }}</span>
      </p>
      <p class="flex items-center gap-[6px]">
      <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
      <span class="text-sm text-obito-text-secondary">18,498 Courses</span>
      </p>
      <button
      class="inline-flex items-center px-4 py-2 bg-white dark:bg-obito-green border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-white uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-obito-green/90 focus:outline-none focus:ring-1 focus:ring-obito-green focus:ring-offset-1 dark:focus:ring-offset-obito-green disabled:opacity-25 transition ease-in-out duration-150">
      <a href="{{ route('pretest.show', ['slug' => $course->slug]) }}">
        Start
      </a>
      </button>
      </div>
    </section>
  @endforeach
    </div>
  </section>
@endsection