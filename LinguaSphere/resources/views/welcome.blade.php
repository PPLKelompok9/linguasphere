@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to Lingua</h1>
            <p class="text-xl text-gray-600">Your Gateway to Professional Certifications</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Featured Certifications -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="text-4xl text-blue-500 mb-4">
                    <i class="fas fa-certificate"></i>
                </div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-3">Professional Certifications</h2>
                <p class="text-gray-600 mb-4">Access a wide range of professional certifications from leading agencies worldwide.</p>
                <a href="{{ route('sertifications.index') }}" class="inline-block bg-blue-500 text-white font-semibold px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Browse Certifications</a>
            </div>

            <!-- Learning Paths -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="text-4xl text-green-500 mb-4">
                    <i class="fas fa-road"></i>
                </div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-3">Learning Paths</h2>
                <p class="text-gray-600 mb-4">Follow structured learning paths designed to help you achieve your certification goals.</p>
                <a href="#" class="inline-block bg-green-500 text-white font-semibold px-4 py-2 rounded hover:bg-green-600 transition duration-300">Explore Paths</a>
            </div>

            <!-- Scholarships -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="text-4xl text-purple-500 mb-4">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-3">Scholarships</h2>
                <p class="text-gray-600 mb-4">Discover scholarship opportunities to support your certification journey.</p>
                <a href="#" class="inline-block bg-purple-500 text-white font-semibold px-4 py-2 rounded hover:bg-purple-600 transition duration-300">Find Scholarships</a>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Why Choose Lingua?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-3xl text-blue-500 mb-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Trusted Partners</h3>
                    <p class="text-gray-600">Partnerships with leading certification agencies</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl text-green-500 mb-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Expert Support</h3>
                    <p class="text-gray-600">Guidance from industry professionals</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl text-yellow-500 mb-3">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Quality Content</h3>
                    <p class="text-gray-600">High-quality learning materials</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl text-purple-500 mb-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Track Progress</h3>
                    <p class="text-gray-600">Monitor your certification journey</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
