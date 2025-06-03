@extends('front.layouts.layouts')

@section('title', 'My Courses - Linguasphere')

@section('content')
    <x-nav-auth :user="auth()->user()" />
    <x-scholarship-notif />     

    <main class="flex flex-col gap-10 pb-10 mt-[30px]">
        <section id="roadmap" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-4 mx-auto">
            <h2 class="font-bold text-[22px] leading-[33px]">Kursus Bahasa Saya</h2>

            @if($data->isEmpty())
                <div class="flex items-center justify-center min-h-[400px]">
                    <div class="flex flex-col items-center gap-4">
                        <p class="text-center text-base">Anda Belum Membeli Kursus Bahasa</p>
                        <a href="{{ route('external.course') }}" style="color: white;" onmouseover="this.style.color='#0f766e'" onmouseout="this.style.color='white'"
                           class="bg-teal-700 border border-gray-300 hover:border-teal-700 rounded-xl font-bold text-xl text-white hover:text-teal-700 text-center py-2 px-6 hover:bg-white transition-colors duration-300">
                            Beli Kursus
                        </a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-2 gap-5">
                    @foreach($data as $transaction)
                        @php
                            $firstSectionId = $transaction->course->courseSections->first()?->id;
                            $firstContentId = $transaction->course->courseSections->first()?->sectionContents->first()?->id;
                        @endphp

                        @if($firstSectionId && $firstContentId)
                        <a href="{{ route('external.course_details', ['course' => $transaction->course->slug, 'courseSection' => $firstSectionId, 'sectionContent' => $firstContentId]) }}" class="card">
                        
                            {{-- <a href="{{ route('courses.learning', ['course' => $transaction->course->slug, 'courseSection' => $firstSectionId, 'sectionContent' => $firstContentId]) }}" class="card"> --}}
                        @else
                            <a href="#" onclick="alert('Konten kursus belum tersedia')" class="card cursor-not-allowed opacity-60 pointer-events-none">
                        @endif
                                <div class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
                                    <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                                        <img src="{{ Storage::url($transaction->course->cover) }}" class="w-full h-full object-cover" alt="thumbnail">
                                    </div>
                                    <div class="flex flex-col gap-3">
                                        <h3 class="font-bold text-lg line-clamp-2">{{ $transaction->course->name }}</h3>
                                        <p class="text-sm text-obito-text-secondary">{{ $transaction->course->level }}</p>
                                    </div>
                                </div>
                            </a>
                    @endforeach
                </div>
            @endif
        </section>
    </main>
@endsection
