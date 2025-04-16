@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Professional Certifications</h1>
            
            <!-- Search and Filter -->
            <div class="w-full md:w-auto flex flex-col md:flex-row gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search certifications..." 
                           class="w-full md:w-64 pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                
                <select class="w-full md:w-48 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Certifications Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($sertifications as $sertification)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <!-- Card Image -->
                <div class="relative h-48 bg-gray-200">
                    <img src="{{ $sertification->cover_image ?? 'https://via.placeholder.com/400x200' }}" 
                         alt="{{ $sertification->title }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-white px-2 py-1 rounded-full text-sm font-medium text-gray-700">
                        <i class="fas fa-star text-yellow-400"></i> 4.5
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="text-sm text-blue-600 font-medium">{{ $sertification->category->name }}</span>
                        <span class="mx-2 text-gray-300">•</span>
                        <span class="text-sm text-gray-600">{{ $sertification->level }}</span>
                    </div>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $sertification->name }}</h3>
                    
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $sertification->description }}</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-blue-600">Rp {{ number_format($sertification->price, 0, ',', '.') }}</span>
                        <a href="{{ route('sertifications.show', $sertification->slug) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">
                            <span>See Details</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    <!-- Agency Info -->
                    <div class="flex items-center text-sm text-gray-600 mb-4">
                        <i class="fas fa-building mr-2"></i>
                        <span>{{ $sertification->agency->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection