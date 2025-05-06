@extends('layouts.app')

@section('content')
<div class="container-fluid p-6">
    <!-- Welcome Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-900">Hello, {{ Auth::user()->name }}</h1>
        <p class="text-gray-600">Let's create something new today!</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-mint-100 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600">Total Revenue</p>
                    <h3 class="text-2xl font-bold">${{ number_format($totalRevenue) }}</h3>
                </div>
                <div class="bg-mint-200 p-3 rounded-full">
                    <i class="fas fa-dollar-sign text-mint-600"></i>
                </div>
            </div>
        </div>

        <div class="bg-pink-100 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600">Total Students</p>
                    <h3 class="text-2xl font-bold">{{ number_format($totalStudents) }}</h3>
                </div>
                <div class="bg-pink-200 p-3 rounded-full">
                    <i class="fas fa-users text-pink-600"></i>
                </div>
            </div>
        </div>

        <div class="bg-yellow-100 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600">New Visitors</p>
                    <h3 class="text-2xl font-bold">{{ number_format($newVisitors) }}</h3>
                </div>
                <div class="bg-yellow-200 p-3 rounded-full">
                    <i class="fas fa-eye text-yellow-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Status Table -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">Course Status</h2>
                <div class="flex space-x-4">
                    <select class="form-select">
                        <option>Sort by</option>
                        <option>Revenue</option>
                        <option>Students</option>
                    </select>
                    <select class="form-select">
                        <option>Last 12 Month</option>
                        <option>Last 6 Month</option>
                        <option>Last 30 Days</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Impressions</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Sales</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Revenue</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($courses as $course)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    <span class="text-2xl">{{ $course->icon }}</span>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $course->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ number_format($course->impressions) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ${{ number_format($course->price) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ number_format($course->total_sales) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ${{ number_format($course->total_revenue) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $courses->links() }}
        </div>
    </div>

    <!-- Right Sidebar Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Total Earnings Card -->
        <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-lg p-6 text-white">
            <h3 class="text-lg font-semibold mb-4">Total Earnings</h3>
            <div class="flex justify-between items-center mb-4">
                <span class="text-3xl font-bold">${{ number_format($totalRevenue) }}</span>
                <button class="bg-white text-green-600 px-4 py-2 rounded-lg text-sm">Withdraw</button>
            </div>
            <div class="flex justify-between text-sm">
                <span>Available</span>
                <span>${{ number_format($totalRevenue * 0.8) }}</span>
            </div>
        </div>

        <!-- Popular Courses -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold">Popular Courses</h3>
            </div>
            <div class="p-6">
                @foreach($popularCourses as $course)
                <div class="flex items-center justify-between mb-4 last:mb-0">
                    <div class="flex items-center">
                        <span class="text-2xl mr-3">{{ $course->icon }}</span>
                        <div>
                            <h4 class="text-sm font-medium">{{ $course->name }}</h4>
                            <p class="text-xs text-gray-500">{{ number_format($course->total_students) }} Students</p>
                        </div>
                    </div>
                    <button class="text-sm text-blue-600">View Course</button>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Top Student Locations -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold">Top Student Location</h3>
            </div>
            <div class="p-6">
                @foreach($topLocations as $location)
                <div class="flex items-center justify-between mb-4 last:mb-0">
                    <div class="flex items-center">
                        <img src="{{ asset('images/flags/' . strtolower($location->country) . '.png') }}" 
                             alt="{{ $location->country }}" 
                             class="w-6 h-4 mr-3">
                        <span class="text-sm">{{ $location->country }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm font-medium">{{ number_format($location->total) }}</span>
                        <div class="w-24 h-2 bg-gray-200 rounded-full ml-3">
                            <div class="h-full bg-blue-600 rounded-full" 
                                 style="width: {{ ($location->total / $totalStudents) * 100 }}%"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-mint-100 { background-color: #E0F2F1; }
    .bg-mint-200 { background-color: #B2DFDB; }
    .text-mint-600 { color: #00897B; }
</style>
@endpush 