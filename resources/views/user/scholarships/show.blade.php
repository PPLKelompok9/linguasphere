@extends('user.layouts.layouts')
@section('title', 'Beasiswa - Linguasphere')
@section('content')
  <x-scholarship-notif />
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="relative h-64 overflow-hidden">
      <div class="h-full relative inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <svg class="absolute" width="2745" height="488" viewBox="0 0 2745 488" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
          d="M0.5 330.864C232.505 403.801 853.749 527.683 1482.69 439.719C2111.63 351.756 2585.54 434.588 2743.87 487"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 308.873C232.505 381.81 853.749 505.692 1482.69 417.728C2111.63 329.765 2585.54 412.597 2743.87 465.009"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 286.882C232.505 359.819 853.749 483.701 1482.69 395.738C2111.63 307.774 2585.54 390.606 2743.87 443.018"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 264.891C232.505 337.828 853.749 461.71 1482.69 373.747C2111.63 285.783 2585.54 368.615 2743.87 421.027"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 242.9C232.505 315.837 853.749 439.719 1482.69 351.756C2111.63 263.792 2585.54 346.624 2743.87 399.036"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 220.909C232.505 293.846 853.749 417.728 1482.69 329.765C2111.63 241.801 2585.54 324.633 2743.87 377.045"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 198.918C232.505 271.855 853.749 395.737 1482.69 307.774C2111.63 219.81 2585.54 302.642 2743.87 355.054"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 176.927C232.505 249.864 853.749 373.746 1482.69 285.783C2111.63 197.819 2585.54 280.651 2743.87 333.063"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 154.937C232.505 227.873 853.749 351.756 1482.69 263.792C2111.63 175.828 2585.54 258.661 2743.87 311.072"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 132.946C232.505 205.882 853.749 329.765 1482.69 241.801C2111.63 153.837 2585.54 236.67 2743.87 289.082"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 110.955C232.505 183.891 853.749 307.774 1482.69 219.81C2111.63 131.846 2585.54 214.679 2743.87 267.091"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 88.9639C232.505 161.901 853.749 285.783 1482.69 197.819C2111.63 109.855 2585.54 192.688 2743.87 245.1"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 66.9729C232.505 139.91 853.749 263.792 1482.69 175.828C2111.63 87.8643 2585.54 170.697 2743.87 223.109"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 44.9819C232.505 117.919 853.749 241.801 1482.69 153.837C2111.63 65.8733 2585.54 148.706 2743.87 201.118"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 22.991C232.505 95.9276 853.749 219.81 1482.69 131.846C2111.63 43.8824 2585.54 126.715 2743.87 179.127"
          class="stroke-neutral-700/50" stroke="currentColor" />
        <path
          d="M0.5 1C232.505 73.9367 853.749 197.819 1482.69 109.855C2111.63 21.8914 2585.54 104.724 2743.87 157.136"
          class="stroke-neutral-700/50" stroke="currentColor" />
        </svg>
        <div class="text-center text-white relative">
        <h1 class="text-3xl font-bold mb-2">{{ $scholarship->title }}</h1>
        <div class="flex items-center justify-center space-x-4">
          <span class="flex items-center">
          <i class="fas fa-book-open mr-2"></i>
          {{ $scholarship->course->name }}
          </span>
          <span class="flex items-center">
          <i class="fas fa-calendar mr-2"></i>
          Deadline: {{ \Carbon\Carbon::parse($scholarship->deadline)->format('M d, Y') }}
          </span>
        </div>
        </div>
      </div>
      </div>

      <div class="p-8">
      <div class="flex items-center justify-between mb-5">
        @if($scholarship->isOpen())
      <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
      Open for Applications
      </span>
      @else
      <span class="bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full">
      Applications Closed
      </span>
      @endif
        <span class="text-gray-600">
        {{ $scholarship->slots_available - $scholarship->applications()->count() }} slots remaining
        </span>
      </div>

      <div id="scholarship-tabs-nav" class="flex items-center gap-3 mb-5">
        <button type="button" class="scholarship-tab-btn group active" data-tab="desc-panel">
        <p
          class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
          <span class="group-[.active]:font-semibold group-[.active]:text-white">Description</span>
        </p>
        </button>
        <button type="button" class="scholarship-tab-btn group" data-tab="req-panel">
        <p
          class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
          <span class="group-[.active]:font-semibold group-[.active]:text-white">Requirements</span>
        </p>
        </button>
        <button type="button" class="scholarship-tab-btn group" data-tab="ben-panel">
        <p
          class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
          <span class="group-[.active]:font-semibold group-[.active]:text-white">Benefits</span>
        </p>
        </button>
      </div>
      <div id="scholarship-tabs-content" class="mt-1">
        <div id="desc-panel" class="scholarship-tab-content">
        <h2 class="text-xl font-semibold mb-4">Description</h2>
        <div class="prose max-w-none">
          {!! $scholarship->description !!}
        </div>
        </div>
        <div id="req-panel" class="scholarship-tab-content hidden">
        <h2 class="text-xl font-semibold mb-4">Requirements</h2>
        <ul class="list-disc list-inside space-y-2">
          @foreach($scholarship->requirements as $requirement)
        <li class="text-gray-600">{{ $requirement['value'] }}</li>
      @endforeach
        </ul>
        </div>
        <div id="ben-panel" class="scholarship-tab-content hidden">
        <h2 class="text-xl font-semibold mb-4">Benefits</h2>
        <ul class="list-disc list-inside space-y-2">
          @foreach($scholarship->benefits as $benefit)
        <li class="text-gray-600">{{ $benefit['value'] }}</li>
      @endforeach
        </ul>
        </div>
      </div>
      <div class="bg-teal-600 rounded-lg text-white mt-5">
        @if($scholarship->isOpen())
      <a href="{{ route('scholarships.apply', $scholarship->id) }}">
      <button type="submit"
        class="w-full bg-teal-600 text-black px-4 py-2 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
        Apply Now !
      </button>
      </a>
      @else
      <div class="text-center py-4">
      <p class="text-gray-600">
        This scholarship is currently not accepting applications.
      </p>
      </div>
      @endif
      </div>
      </div>
    </div>
    </div>
  </div>
@endsection

@push('after-scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const tabBtns = document.querySelectorAll('.scholarship-tab-btn');
    const tabContents = document.querySelectorAll('.scholarship-tab-content');

    tabBtns.forEach(btn => {
      btn.addEventListener('click', function () {
      // Remove active from all buttons
      tabBtns.forEach(b => b.classList.remove('active'));
      // Hide all tab contents
      tabContents.forEach(tc => tc.classList.add('hidden'));

      // Activate clicked button
      btn.classList.add('active');
      // Show corresponding tab content
      const target = btn.getAttribute('data-tab');
      document.getElementById(target).classList.remove('hidden');
      });
    });
    });
  </script>
@endpush