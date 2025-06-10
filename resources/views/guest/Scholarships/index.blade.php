@extends('welcome')

@section('content')

  <main class="pb-10">
    <section class="pl-[calc(((100%-1280px)/2)+75px)] pr-[calc(((100%-1280px)/2)+75px)] flex flex-col gap-10">
    <div class="py-5">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900">Available Scholarships</h1>
        <p class="mt-2 text-lg text-gray-600">Discover opportunities to advance your education</p>
      </div>

      <!-- Scholarship Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($scholarships as $scholarship)
      <div
      class="group hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 rounded-xl p-5 transition relative">
      <div class="absolute top-4 right-4">
        @if ($scholarship->isOpen())
      <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Open</span>
      @else
      <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Closed</span>
      @endif
      </div>
      <div class="aspect-w-16 aspect-h-10">
        <img class="w-full object-cover rounded-xl" src="{{ $scholarship->course->cover }}" alt="Course" />
      </div>
      <h3 class="pt-5 text-xl text-gray-800 font-bold">
        {{ $scholarship->title }}
      </h3>
      <div class="flex items-center justify-between pt-2">
        <p class="text-sm text-gray-600">
        Deadline: {{ \Carbon\Carbon::parse($scholarship->deadline)->translatedFormat('d F Y') }}
        </p>
        <p class="text-sm text-gray-600">
        Kuota: {{ $scholarship->slots_available }}
        </p>
      </div>
      <div class="pt-5">
        @if ($scholarship->isOpen())
      <a href="{{ route('scholarships.detail', $scholarship->id) }}"
      class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-teal-600 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
      Learn More
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
      @endforeach
      </div>
      </div>
    </div>
    </section>
  </main>

@endsection