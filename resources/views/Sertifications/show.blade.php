@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('sertifications.index') }}" class="text-gray-700 hover:text-blue-600">
                        <i class="fas fa-home mr-2"></i>
                        Certifications
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-500">{{ $sertification->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Course Header -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="relative h-64 md:h-96 bg-gray-200">
                <img src="{{ $sertification->cover ?? 'https://via.placeholder.com/1200x600' }}" 
                     alt="{{ $sertification->name }}" 
                     class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                    <div class="flex items-center text-white mb-2">
                        <span class="bg-blue-500 px-3 py-1 rounded-full text-sm font-medium mr-3">{{ $sertification->category->name }}</span>
                        <span class="flex items-center text-sm">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            4.5 (128 reviews)
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $sertification->name }}</h1>
                    <p class="text-white text-lg">By {{ $sertification->agency->name }}</p>
                </div>
            </div>

            <!-- Course Info -->
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-book-open text-blue-500 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total Lessons</p>
                            <p class="text-lg font-semibold">{{ $sertification->lessons_count ?? 0 }} Lessons</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-clock text-green-500 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Duration</p>
                            <p class="text-lg font-semibold">{{ $sertification->duration ?? '8 weeks' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-signal text-purple-500 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Level</p>
                            <p class="text-lg font-semibold">{{ $sertification->level }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="prose max-w-none mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">About This Course</h2>
                    <p class="text-gray-600">{{ $sertification->description }}</p>
                </div>

                <!-- What You'll Learn -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">What You'll Learn</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach(['Master key concepts', 'Build real projects', 'Earn certification', 'Join community'] as $benefit)
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">{{ $benefit }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Prerequisites -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Prerequisites</h2>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>Basic understanding of the field</li>
                        <li>Access to required software/tools</li>
                        <li>Dedication to complete assignments</li>
                    </ul>
                </div>

                <!-- CTA Button -->
                <div class="flex justify-center">
                    <button class="bg-blue-500 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-600 transition duration-300 flex items-center">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Enroll Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection