@extends('user.layouts.layouts')
@section('content')
  <main class="pb-10 mt-[30px]">
    <section class="pl-[calc(((100%-1280px)/2)+75px)] pr-[calc(((100%-1280px)/2)+75px)]">
    <div class="tab-content grid grid-cols-4 flex-wrap gap-5">
      @foreach($courses as $course)
      <div class="card">
      <div
      class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
      <div class="thumbnail-container p-[10px]">
      <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
        <img src="{{ $course->cover }}" class="w-full h-full object-cover" alt="thumbnail">
        {{-- Tambahkan rating jika ada --}}
      </div>
      </div>
      <div class="flex flex-col p-4 pt-0 gap-[13px]">
      <h3 class="font-bold text-lg line-clamp-4 overflow-hidden max-h-[56px] min-h-[56px]">{{ $course->name }}
      </h3>
      <p class="text-sm w-full text-obito-text-secondary text-justify overflow-hidden line-clamp-4">
        {{ $course->description }}
      </p>
      <button class="border border-obito-grey bg-obito-green text-white rounded-lg">
        <a
        href="{{ route('pretest.test', $course->slug) }}">{{ isset($pretests[$course->id]) ? 'Restart PreTest' : 'Start PreTest' }}</a>
      </button>
      </div>
      </div>
      </div>
    @endforeach
    </div>
    @if(session('alert'))
    <script>
      alert("{!! str_replace(['"', "\n", "\r"], ['\"', '\n', ''], session('alert')) !!}");
      window.location.href = "{{ route('pretest') }}";
    </script>
    @endif
    </section>
  </main>
@endsection