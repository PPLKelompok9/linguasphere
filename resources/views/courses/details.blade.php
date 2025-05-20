@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Course Main Content -->
        <div class="col-lg-8">
            <!-- Course Header -->
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="card-title">{{ $course->title }}</h1>
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge bg-primary me-2">{{ $course->category }}</span>
                        <span class="text-muted"><i class="fas fa-users me-1"></i> {{ $course->enrolled_students }} students</span>
                    </div>
                    <p class="card-text">{{ $course->short_description }}</p>
                </div>
            </div>

            <!-- Course Description -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="h4 card-title">About This Course</h2>
                    <div class="course-description">
                        {!! $course->description !!}
                    </div>
                </div>
            </div>

            <!-- Course Curriculum -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="h4 card-title mb-4">Course Curriculum</h2>
                    <div class="accordion" id="courseContent">
                        @foreach($course->sections as $index => $section)
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" 
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}">
                                    {{ $section->title }}
                                </button>
                            </h3>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                 data-bs-parent="#courseContent">
                                <div class="accordion-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach($section->lessons as $lesson)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fas fa-play-circle me-2"></i>
                                                {{ $lesson->title }}
                                            </div>
                                            <span class="text-muted">{{ $lesson->duration }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4">
            <div class="card mb-4 position-sticky" style="top: 20px;">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h3 class="h2 text-primary mb-3">${{ number_format($course->price, 2) }}</h3>
                        <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg w-100">Enroll Now</button>
                        </form>
                    </div>

                    <div class="course-features">
                        <h4 class="h5 mb-3">This course includes:</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-video me-2"></i> {{ $course->video_hours }} hours on-demand video</li>
                            <li class="mb-2"><i class="fas fa-file-alt me-2"></i> {{ $course->article_count }} articles</li>
                            <li class="mb-2"><i class="fas fa-infinity me-2"></i> Full lifetime access</li>
                            <li class="mb-2"><i class="fas fa-mobile-alt me-2"></i> Access on mobile and TV</li>
                            <li class="mb-2"><i class="fas fa-certificate me-2"></i> Certificate of completion</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Instructor Info -->
            <div class="card">
                <div class="card-body">
                    <h4 class="h5 mb-3">Instructor</h4>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ $course->instructor->avatar }}" alt="{{ $course->instructor->name }}" 
                             class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <h5 class="mb-1">{{ $course->instructor->name }}</h5>
                            <p class="text-muted mb-0">{{ $course->instructor->title }}</p>
                        </div>
                    </div>
                    <p class="mb-0">{{ $course->instructor->bio }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .course-description {
        font-size: 1.1rem;
        line-height: 1.6;
    }
    .course-features i {
        width: 20px;
        color: #0d6efd;
    }
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
    }
    .list-group-item i {
        color: #0d6efd;
    }
</style>
@endpush
@endsection