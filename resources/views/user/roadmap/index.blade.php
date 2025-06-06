@extends('front.layouts.layouts')
@section('content')
  @php
    $activeCategory = request('category_id') ?? ($categories->first()->id ?? null);
  @endphp
  <main class="pb-10 mt-[30px]">
    <section class="pl-[calc(((100%-1280px)/2)+75px)] pr-[calc(((100%-1280px)/2)+75px)]">
    <section id="catalog" class="flex flex-col w-full max-w-[1280px] gap-4 mx-auto">
      <h1 class="font-bold text-[22px] leading-[33px]">Roadmap Courses</h1>
      <div id="tabs-container" class="flex items-center gap-3">
      @foreach($categories as $category)
      <a href="?category_id={{ $category->id }}">
      <button type="button"
      class="tab-btn group {{ $activeCategory == $category->id ? '!bg-obito-black text-black font-semibold' : '' }}">
      <p
        class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green transition-all duration-300 {{ $activeCategory == $category->id ? 'bg-black text-white' : "bg-white" }}">
        <span>{{ $category->name }}</span>
      </p>
      </button>
      </a>
    @endforeach
      </div>
      <div id="tabs-content-container" class="max-w-7xl mx-auto">
      @foreach ($paths as $path)
      @php
      $hasCourseInCategory = $path->pathdetails->contains(function ($detail) use ($activeCategory) {
      return $detail->course && $detail->course->id_category == $activeCategory;
      });
      @endphp

      @if($hasCourseInCategory)
      <h1 class="font-bold text-[22px] leading-[33px] text-center py-5">{{ $path->name }}</h1>
      @foreach ($path->pathdetails as $detail)
      @if($detail->course && $detail->course->id_category == $activeCategory)
      <a href="{{ route('courses.detail', $detail->course->slug) }}" class="card">
        <div
        class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
        <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
        <img src="{{ Storage::url($detail->course->cover) }}" class="w-full h-full object-cover" alt="thumbnail">
        </div>
        <div class="flex flex-col justify-between h-[100px] flex-1 gap-3">
        <h3 class="font-bold text-lg line-clamp-2 self-start">{{ $detail->course->name }}</h3>
        <div class="flex">
        <img src="/assets/icons/Star 1.svg" class="flex shrink-0 w-5" alt="star">
        <img src="/assets/icons/Star 1.svg" class="flex shrink-0 w-5" alt="star">
        <img src="/assets/icons/Star 1.svg" class="flex shrink-0 w-5" alt="star">
        <img src="/assets/icons/Star 1.svg" class="flex shrink-0 w-5" alt="star">
        <img src="/assets/icons/Star 1.svg" class="flex shrink-0 w-5" alt="star">
        </div>
        </div>
        </div>
      </a>
      @php
      $filteredDetails = $path->pathdetails->filter(function ($d) use ($activeCategory) {
      return $d->course && $d->course->id_category == $activeCategory;
      });
      $isLast = $detail === $filteredDetails->last();
      @endphp
      @if(!$isLast)
      <div class="flex justify-center text-gray-400">
      <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
      <g fill="none">
        <path
        d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
        <path fill="currentColor"
        d="M10.5 16.035L7.404 12.94a1.5 1.5 0 1 0-2.122 2.121l5.657 5.657a1.5 1.5 0 0 0 2.122 0l5.657-5.656a1.5 1.5 0 1 0-2.122-2.122L13.5 16.035V4.5a1.5 1.5 0 0 0-3 0z" />
      </g>
      </svg>
      </div>
      @endif
      @endif
      @endforeach
      @endif
    @endforeach
      </div>
    </section>
    </section>
  </main>
@endsection