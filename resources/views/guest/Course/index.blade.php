@extends('welcome')

@section('content')

  <main class="flex flex-col gap-10 pb-10 mt-[30px]">
    <section id="roadmap" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-4 mx-auto">
    <h2 class="font-bold text-[22px] leading-[33px]">Our Language Courses</h2>
    <div class="grid grid-cols-2 gap-5">
      @foreach ($coursesByCategory as $category)
      <a href="{{ route('courses.guestDetail', ['id' => $category['id']]) }}" class="card">
      <div
      class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
      <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="{{ Storage::url($category['images']) }}" class="w-full h-full object-cover" alt="thumbnail">

      </div>
      <div class="flex flex-col gap-3">
      <h3 class="font-bold text-lg line-clamp-2">{{ $category['name'] }}</h3>
      </div>
      </div>
      </a>
    @endforeach
    </div>
    </section>

  </main>

@endsection