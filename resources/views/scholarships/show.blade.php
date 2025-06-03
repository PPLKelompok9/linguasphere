@extends('front.layouts.layouts')  
@section('title', 'Beasiswa - Linguasphere')  
@section('content')  
 <x-nav-auth :user="auth()->user()" />
<x-scholarship-notif /> 
<div class="py-12">  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">  
            <!-- Scholarship Header -->  

            <div class="relative h-64">  
                <img src="{{ Storage::url($scholarship->course->cover) }}" alt="{{ $scholarship->course->name }}" class="w-full h-full object-cover">  
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
                                Deadline: {{ \Carbon\Carbon::parse($scholarship->deadline)->format('M d, Y') }}  
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
                                    <li class="text-gray-600">{{ $requirement['value'] }}</li>  
                                @endforeach  
                            </ul>  
                        </div>  
  
                        <!-- Benefits -->  
                        <div>  
                            <h2 class="text-xl font-semibold mb-4">Benefits</h2>  
                            <ul class="list-disc list-inside space-y-2">  
                                @foreach($scholarship->benefits as $benefit)  
                                    <li class="text-gray-600">{{ $benefit['value'] }}</li>  
                                @endforeach  
                            </ul>  
                        </div>  
                    </div>  
  
                    <!-- Right Column - Application -->  
                    <div class="lg:col-span-1">    
                    <div class="bg-gray-50 rounded-lg p-6">    
                        @if($scholarship->isOpen())    
                            <a href="{{ route('scholarships.apply', $scholarship->id) }}">
                                <button type="submit" class="w-full bg-teal-600 text-black px-4 py-2 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">    
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
    </div>  
</div>  
@endsection  