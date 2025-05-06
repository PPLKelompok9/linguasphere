@extends('layouts.app')

@section('content')
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
                    <img src="{{ $scholarship->course->cover }}" alt="{{ $scholarship->course->name }}" class="w-full h-48 object-cover">
                    
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
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $scholarship->title }}</h2>
                    
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="fas fa-book-open mr-2"></i>
                        <span>{{ $scholarship->course->name }}</span>
                    </div>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>Deadline: {{ $scholarship->deadline->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-users mr-2"></i>
                            <span>{{ $scholarship->slots_available - $scholarship->applications()->count() }} slots remaining</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('scholarships.show', $scholarship) }}" 
                           class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-teal-600 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $scholarships->links() }}
        </div>
    </div>
</div>
@endsection 