@extends('front.layouts.layouts')

@section('title', 'Details Course')

@section('content')
    <x-nav-auth :user="auth()->user()" />
        <main class="flex flex-col gap-[30px] pb-10 mt-[30px]">
            <header class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
                <div id="thumbnail-container" class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
                    <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-cover" alt="thumbnail">
                </div>
                <div id="course-info" class="flex flex-col justify-center gap-[30px]">
                    <div class="flex flex-col gap-[10px]">
                        <h1 class="font-bold text-[28px] leading-[42px]">{{$course->name}}</h1>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="flex gap-4 items-center">
                            <p class="flex items-center gap-[6px]">
                                <img src="{{    asset('assets/images/icons/briefcase-green.svg')}}" class="w-6 flex shrink-0" alt="icon">
                                <span class="font-semibold text-sm leading-[21px]">{{$course->level}}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        @php
                            $firstSectionId = $course->courseSections->first()?->id;
                            $firstContentId = $course->courseSections->first()?->sectionContents->first()?->id;
                        @endphp
                        <a href="{{ route('courses.learning', ['course' => $course->slug, 'courseSection' => $firstSectionId, 'sectionContent' => $firstContentId]) }}" class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                            <span class="font-semibold text-white">Start Learning Now</span>
                        </a>
                    
                    </div>
                </div>
            </header>
            <section id="details" class="flex flex-col w-full max-w-[1000px] gap-4 mx-auto">
                <h2 class="font-bold text-[22px] leading-[33px]">About</h2>
                <div id="contents" class="flex flex-col gap-5">
                    <div id="tabs-content-container">
                        <div id="about-content" class="tab-content flex flex-col gap-[30px]">
                            <div id="description" class="flex flex-col gap-4 leading-7 w-full max-w-[844px]">
                                {{ $course->description }}
                            </div>
                            <div id="instructors" class="flex flex-col w-full max-w-[900px] rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
                                <h3 class="font-semibold text-lg">Course Instructors</h3>
                                <div class="grid grid-cols-2 gap-5">
                                    <div class="instructors-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                                                    <img src="{{ Storage::url($course->agency->cover) }}" class="w-full h-full object-cover" alt="photo">
                                                </div>
                                                <div>
                                                    <p class="font-semibold">  {{ $course->agency->name }}</p>
                                                    <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="border-obito-grey">
                                        <p class="leading-7">{{ $course->agency->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection