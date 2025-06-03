@extends('front.layouts.layouts')

@section('title', 'Learn English')

@push('after-styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
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

    .roadmap-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
    }

    .level-card {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        gap: 20px;
    }

    .flag-container {
        width: 100px;
        height: 100px;
        background-color: #f0f0f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .flag {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .level-content {
        flex: 1;
    }

    .level-content h2 {
        color: #333;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .level-content p {
        margin-bottom: 10px;
        color: #666;
    }

    .learn-button {
        background-color: #3D8577;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .learn-button:hover {
        background-color: #2c6358;
    }

    .target-icon {
        font-size: 20px;
    }
</style>
@endpush

@section('content')
<x-nav-guests/>

<div class="roadmap-container">
    @foreach($courses as $course)
        @foreach($course['courses'] as $c)
        <div class="level-card">
            <div class="flag-container">
                <img src="{{  Storage::url($c['cover']) }}" alt="English Flag" class="flag">
            </div>
            <div class="level-content">
                <h2><span class="target-icon"></span> {{ $c['name'] }}</h2>
                <p>Rp{{ number_format($c['price'], 0, ',', '.') }}</p>
                <p>{{ $c['description'] }}</p>
                <a href="{{ route('external.checkouts', $c['id']) }}">
                    <button class="learn-button">Learn Class now</button>
                </a>
            </div>
        </div>
        @endforeach
    @endforeach
</div>
@endsection
