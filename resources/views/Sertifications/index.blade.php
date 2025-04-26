@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Professional Certifications</h1>
            
            <!-- Search and Filter -->
            <form action="{{ route('sertifications.index') }}" method="GET" class="w-full md:w-auto">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               placeholder="Search certifications..." 
                               value="{{ request('search') }}"
                               class="w-full md:w-64 pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="submit" class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    
                    <select name="category" 
                            onchange="this.form.submit()"
                            class="w-full md:w-48 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <!-- Certifications Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($sertifications as $sertification)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ $sertification->cover }}" alt="{{ $sertification->name }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $sertification->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($sertification->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">Rp {{ number_format($sertification->price, 0, ',', '.') }}</span>
                        <span class="text-sm text-gray-500">{{ $sertification->level }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection