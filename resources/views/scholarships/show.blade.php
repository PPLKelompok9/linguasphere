@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <!-- Scholarship Header -->
            <div class="relative h-64">
                <img src="{{ $scholarship->course->cover }}" alt="{{ $scholarship->course->name }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-3xl font-bold mb-2">{{ $scholarship->title }}</h1>
                        <div class="flex items-center justify-center space-x-4">
                            <span class="flex items-center">
                                <i class="fas fa-book-open mr-2"></i>
                                {{ $scholarship->course->name }}
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                Deadline: {{ $scholarship->deadline->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <!-- Status and Quick Info -->
                <div class="flex justify-between items-center mb-8">
                    <div class="flex items-center space-x-4">
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
                </div>

                <!-- Main Content -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column - Details -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Description -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4">Description</h2>
                            <div class="prose max-w-none">
                                {!! $scholarship->description !!}
                            </div>
                        </div>

                        <!-- Requirements -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4">Requirements</h2>
                            <ul class="list-disc list-inside space-y-2">
                                @foreach($scholarship->requirements as $requirement)
                                    <li class="text-gray-600">{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Benefits -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4">Benefits</h2>
                            <ul class="list-disc list-inside space-y-2">
                                @foreach($scholarship->benefits as $benefit)
                                    <li class="text-gray-600">{{ $benefit }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Right Column - Application -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h2 class="text-xl font-semibold mb-4">Apply Now</h2>
                            
                            @if($scholarship->isOpen())
                                <form action="{{ route('scholarships.apply', $scholarship) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    
                                    <div>
                                        <label for="motivation_letter" class="block text-sm font-medium text-gray-700">
                                            Motivation Letter
                                        </label>
                                        <textarea
                                            id="motivation_letter"
                                            name="motivation_letter"
                                            rows="5"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"
                                            placeholder="Tell us why you deserve this scholarship..."
                                            required
                                        >{{ old('motivation_letter') }}</textarea>
                                    </div>

                                    <div>
                                        <label for="cv" class="block text-sm font-medium text-gray-700">
                                            CV/Resume (PDF)
                                        </label>
                                        <input
                                            type="file"
                                            id="cv"
                                            name="cv"
                                            accept=".pdf"
                                            class="mt-1 block w-full text-sm text-gray-500
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-full file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-teal-50 file:text-teal-700
                                                hover:file:bg-teal-100"
                                            required
                                        >
                                    </div>

                                    <button type="submit" class="w-full bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                        Submit Application
                                    </button>
                                </form>
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
    </div>
</div>
@endsection 