@extends('welcome')

@section('content')

  <main class="pb-10 mt-[30px]">
    <section class="pl-[calc(((100%-1280px)/2)+75px)] pr-[calc(((100%-1280px)/2)+75px)] flex flex-col gap-10">
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900">Available Scholarships</h1>
        <p class="mt-2 text-lg text-gray-600">Discover opportunities to advance your education</p>
      </div>

      <!-- Scholarship Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($scholarships as $scholarship)
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
      <div class="relative">
        <!-- Course Image -->
        <img src="{{ Storage::url($scholarship->course->cover) }}" class="w-30 h-30 object-cover" alt="Course">

        <!-- Status Badge -->
        <div class="absolute top-4 right-4">
        @if($scholarship->isOpen())
      <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Open</span>
      @else
      <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Closed</span>
      @endif
        </div>
      </div>

      <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-2"></h2>

        <div class="flex items-center text-sm text-gray-500 mb-4">
        <i class="fas fa-book-open mr-2"></i>
        <span></span>
        </div>

        <div class="space-y-2 mb-4">
        <div class="flex items-center text-black font-semibold text-xl">
        <i class="fas fa-calendar mr-2"></i>
        <h3>{{$scholarship->title}}</h3>
        </div>
        <div class="flex items-center text-sm text-gray-500">
        <i class="fas fa-calendar mr-2"></i>
        <span>Deadline: {{$scholarship->deadline}}</span>
        </div>
        <div class="flex items-center text-sm text-gray-500">
        <i class="fas fa-users mr-2"></i>
        <span>Kuota : {{$scholarship->slots_available}}</span>
        </div>
        </div>

        <div class="mt-4">
        @if($scholarship->isOpen())
      <a href="{{ route('scholarships.detail', $scholarship->id) }}"
      class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-teal-600 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
      Selengkapnya
      </a>
      @else
      <button
      class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-400 bg-gray-600 rounded-md cursor-not-allowed"
      disabled>
      Closed
      </button>
      @endif
        </div>
      </div>
      </div>
      @endforeach
      </div>
      </div>
    </div>
    </section>
  </main>

@endsection