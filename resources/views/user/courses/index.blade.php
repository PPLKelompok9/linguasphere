@extends('user.layouts.layouts')
@section('content')
  <main class="pb-10 mt-[30px]">
    <section class="pl-[calc(((100%-1280px)/2)+75px)] pr-[calc(((100%-1280px)/2)+75px)] flex flex-col gap-10">
    <section id="catalog" class="flex flex-col w-full max-w-[1280px] gap-4 mx-auto">
      <div class="flex justify-between items-center">
      <h1 class="font-bold text-[22px] leading-[33px]">Course Catalog</h1>
      <form action="{{ route('courses.search') }}" method="GET" class="flex gap-2">
        <input type="text" name="search" class="border border-obito-grey rounded-full px-4 py-2 focus:outline-none"
        placeholder="Search course..." value="{{ request('search') }}">
        <button type="submit"
        class="bg-obito-green text-white rounded-full px-4 py-2 font-semibold hover:bg-obito-black transition-all">
        Search
        </button>
      </form>
      </div>
      <div id="tabs-container" class="flex items-center gap-3">
      <button type="button" class="tab-btn group active" data-target="category-all">
        <p
        class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
        <span class="group-[.active]:font-semibold group-[.active]:text-white">All</span>
        </p>
      </button>
      @foreach($categories as $i => $category)
      <button type="button" class="tab-btn group" data-target="category-{{ $category->id }}">
      <p
      class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
      <span class="group-[.active]:font-semibold group-[.active]:text-white">{{ $category->name }}</span>
      </p>
      </button>
    @endforeach
      </div>
      <div id="tabs-content-container" class="mt-1">
      {{-- Tab All --}}
      <div id="category-all" class="tab-content grid grid-cols-4 gap-5">
        @foreach($courses as $course)
      <a href="{{ route('courses.detail', $course->slug) }}" class="card">
      <div
        class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
        <div class="thumbnail-container p-[10px]">
        <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
        <img src="{{ $course->cover }}" class="w-full h-full object-cover" alt="thumbnail">
        </div>
        </div>
        <div class="flex flex-col p-4 pt-0 gap-[13px]">
        <h3 class="font-bold text-lg min-h-[56px] max-h-[56px] overflow-hidden line-clamp-2">{{ $course->name }}
        </h3>
        <p class="flex items-center gap-[6px]">
        <img src="{{ asset('assets/images/icons/crown-green.svg') }}" alt="icon">
        <span class="text-sm text-obito-text-secondary">{{ $course->category?->name ?? '-' }}</span>
        </p>
        <p class="flex items-center gap-[6px]">
        <img src="/assets/images/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
        <span class="text-sm text-obito-text-secondary">{{ $course->courseSections->count() }} Lessons</span>
        </p>
        <p class="flex items-center gap-[6px]">
        <img src="{{ asset('assets/images/icons/briefcase-green.svg') }}" class="flex shrink-0 w-5"
        alt="icon">
        <span class="text-sm text-obito-text-secondary">Rp
        {{ number_format($course->price, 0, ',', '.') }}</span>
        </p>
        </div>
      </div>
      </a>
      @endforeach
      </div>
      {{-- Tab per kategori --}}
      @foreach($categories as $category)
      <div id="category-{{ $category->id }}" class="tab-content grid grid-cols-4 gap-5 hidden">
        @foreach($courses->where('id_category', $category->id) as $course)
      <a href="{{ route('courses.detail', $course->slug) }}" class="card">
      <div
        class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
        <div class="thumbnail-container p-[10px]">
        <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
        <img src="{{ $course->cover }}" class="w-full h-full object-cover" alt="course cover">
        </div>
        </div>
        <div class="flex flex-col p-4 pt-0 gap-[13px]">
        <h3 class="font-bold text-lg min-h-[56px] max-h-[56px] overflow-hidden line-clamp-2">{{ $course->name }}
        </h3>
        <p class="flex items-center gap-[6px]">
        <img src="{{ asset('assets/images/icons/crown-green.svg') }}" class="flex shrink-0 w-5" alt="icon">
        <span class="text-sm text-obito-text-secondary">{{ $course->category?->name ?? '-' }}</span>
        </p>
        <p class="flex items-center gap-[6px]">
        <img src="{{ asset('assets/images/icons/menu-board-green.svg') }}" class="flex shrink-0 w-5"
        alt="icon">
        <span class="text-sm text-obito-text-secondary">0 Lessons</span>
        </p>
        <p class="flex items-center gap-[6px]">
        <img src="{{ asset('assets/images/icons/briefcase-green.svg') }}" class="flex shrink-0 w-5"
        alt="icon">
        <span class="text-sm text-obito-text-secondary">Rp
        {{ number_format($course->price, 0, ',', '.') }}</span>
        </p>
        </div>
      </div>
      </a>
      @endforeach
      </div>
    @endforeach
      </div>
    </section>
    </section>
  </main>
@endsection