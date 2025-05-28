@extends('front.layouts.layouts')

@section('title', 'Learning Roadmap')

@push('after-styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header {
        background-color: #3D8577;
        color: white;
        padding: 20px;
        text-align: center;
    }

    .header h1 {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .courses-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .course-card {
        background-color: white;
        border-radius: 10px;
        padding: 40px 20px;
        text-align: center;
        color: black;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .course-card:hover {
        background-color: #3D8577;
        color: white;
    }

    .start-button {
        background-color: #3D8577;
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        transition: transform 0.3s ease;
    }

    .start-button:hover {
        transform: scale(1.05);
        background-color: white;
        color: #3D8577;
    }
</style>
@endpush

@section('content')
<x-nav-auth :user="auth()->user()"/>

<div class="courses-container">
    @foreach ($coursesByCategory as $category)
        <div class="course-card">
            {{-- Optional: Image Preview --}}
            <img src="{{ Storage::url($category['images']) }}" class="w-24" alt="Category Logo">
            <h2>{{ $category['name'] }}</h2>
            <a href="{{ route('courses.detail', ['id' => $category['id']]) }}" class="start-button">Start Journey</a>
        </div>
    @endforeach
</div>
@endsection
