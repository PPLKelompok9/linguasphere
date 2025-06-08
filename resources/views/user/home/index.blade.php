@extends('front.layouts.layouts')
@section('content')
  <main class="flex flex-col gap-10 pb-10 mt-[30px]">
    <section id="roadmap" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-4 mx-auto">
    <h2 class="font-bold text-[22px] leading-[33px]">Kursus Bahasa Saya</h2>
    <div class="grid grid-cols-2 gap-5">
      @forelse($data as $transaction)
      <a href="{{ route('courses.learning', ['course' => $transaction->course->slug, 'courseSection' => $firstSectionId, 'sectionContent' => $firstContentId]) }}"
      class="card">
      <div
      class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
      <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="{{ Storage::url($transaction->course->cover) }}" class="w-full h-full object-cover"
        alt="thumbnail">

      </div>
      <div class="flex flex-col gap-3">
      <div class="flex items-center justify-between">
        <h3 class="font-bold text-lg line-clamp-2">{{$transaction->course->name}}</h3>
        <p class="flex items-center gap-[6px]">

        <span class="text-sm text-obito-text-secondary">{{$transaction->course->level}}</span>
        </p>
      </div>
      <p class="flex items-center gap-[6px]">

        <span
        class="text-sm text-obito-text-secondary overflow-hidden line-clamp-4 text-justify">{{$transaction->course->description}}</span>
      </p>
      </div>
      </div>
      </a>
    @empty
      <div class="flex flex-col">
      <p class="text-center">Anda Belum Membeli Kursus Bahasa</p>
      <a href="{{ route('courses.user') }}"
      class="bg-teal-700 hover:bg-teal-600 border border-gray-300 hover:border-teal-700 rounded-xl font-bold text-xl text-white hover:text-teal-700 text-center py-2">Beli
      Kursus</a>
      </div>
    @endforelse

    </div>
    </section>
  </main>
@endsection