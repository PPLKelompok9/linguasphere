@extends('user.layouts.layouts')
@section('title', 'Course Learning - Linguasphere')
@section('content')

  <body>
    <div class="flex h-screen">
    <aside class="flex flex-col border border-obito-grey bg-white">
      <div class="w-[260px] pb-[20px] h-[280px] px-5 pt-5 flex flex-col gap-5">
      <ul>
        <li>
        <a href="{{ route('dashboard.user') }}">
          <div
          class="flex items-center gap-2 py-[10px] px-[14px] rounded-full border border-obito-grey bg-white hover:border-obito-green transition-all duration-300">
          <img src="{{asset('assets/images/icons/home-trend-up.svg')}}" alt="icon" class="size-[20px] shrink-0" />
          <p>Back to Dashboard</p>
          </div>
        </a>
        </li>
      </ul>
      <header class="flex flex-col gap-[12px]">
        <div class="flex justify-center items-center overflow-hidden w-full h-[100px] rounded-[14px]">
        <img src="{{ $course->cover }}" alt="cover course" class="w-full h-full object-cover" />
        </div>
        <h1 class="font-bold">{{$course->name}}</h1>
      </header>
      <hr class="border-obito-grey" />
      </div>
      <div id="lessons-container" class="h-full overflow-y-auto [&::-webkit-scrollbar]:hidden w-[260px]">
      <nav class="px-5 pb-[33px] flex flex-col gap-5">
        @foreach($course->courseSections as $section)
      <div
      class="lesson accordion flex flex-col gap-4 {{ $currentSection && $section->id == $currentSection->id ? 'active-accordion' : '' }}">
      <button type="button" data-expand="{{ $section->id }}" class="flex items-center justify-between">
        <h2 class="font-semibold">{{ $section->name }}</h2>
        <img src="{{ asset('assets/images/icons/arrow-circle-down.svg') }}" alt="icon"
        class="size-6 shrink-0 transition-all duration-300" />
      </button>
      <div id="{{ $section->id }}" class="">
        <ul class="flex flex-col gap-4">
        @foreach($section->sectionContents as $content)
        <li
        class="group {{ $currentSection && $section->id == $currentSection->id && $currentContent->id == $content->id ? 'active' : '' }}">
        <a href="{{ route('courses.learning', [
      'course' => $course->slug,
      'courseSection' => $section->id,
      'sectionContent' => $content->id,
      ]) }}">
        <div
        class="px-4 group-[&.active]:bg-obito-black group-[&.active]:border-transparent group-[&.active]:text-white py-[10px] rounded-full border border-obito-grey group-hover:bg-obito-black transition-all duration-300">
        <h3
        class="font-semibold text-sm leading-[21px] group-hover:text-white transition-all duration-300">
        {{ $content->name }}
        </h3>
        </div>
        </a>
        </li>
      @endforeach
        </ul>
      </div>
      </div>
      <hr class="border-obito-grey" />
      @endforeach
      </nav>
      </div>
    </aside>
    <div class="flex-grow overflow-y-auto">
      <main class="pt-[30px] pb-[30px] px-[20px]">
      <article class="w-full h-full">
        <div class="content-ebook ml-5">
        <h1 class="mb-5">{{ $currentContent->name }}</h1>
        @php
      // Deteksi link YouTube
      $youtubeRegex = '/https?:\/\/(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/';
      $youtubeShortRegex = '/https?:\/\/youtu\.be\/([a-zA-Z0-9_-]+)/';
      $content = trim($currentContent->content);
      $youtubeId = null;
      if (preg_match($youtubeRegex, $content, $matches)) {
        $youtubeId = $matches[1];
      } elseif (preg_match($youtubeShortRegex, $content, $matches)) {
        $youtubeId = $matches[1];
      }
      @endphp

        @if ($youtubeId)
      <div class="aspect-video mb-5">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $youtubeId }}"
        title="Youtube video player" allowfullscreen class="w-full h-full rounded-lg"></iframe>
      </div>
      @else
      {!! $currentContent->content !!}
      @endif
        </div>
      </article>
      </main>
      <nav class="fixed bottom-0 left-auto right-0 z-30 mx-auto w-[calc(100%-260px)] pt-5 pb-[30px] bg-[#F8FAF9]">
      <div class="px-[30px]">
        <div
        class="content border border-obito-grey rounded-[20px] bg-white p-[12px] flex items-center justify-between">
        <p class="text-obito-text-secondary">Pelajari materi dengan baik</p>
        <div class="buttons flex items-center gap-[12px]">
          @if (!$isFinished)
          <a href="{{ route('courses.learning', [
        'course' => $course->slug,
        'courseSection' => $nextContent->course_section_id,
        'sectionContent' => $nextContent->id,
        ]) }}"
          class="rounded-full border bg-obito-green text-white px-5 py-[10px] hover:drop-shadow-effect transition-all duration-300">
          <span class="font-semibold">Next Lesson</span>
          </a>
      @else
        <a href="{{ route('courses.finished', $course->slug) }}"
        class="rounded-full border bg-obito-green text-white px-5 py-[10px] hover:drop-shadow-effect transition-all duration-300">
        <span class="font-semibold">Finish Learning</span>
        </a>
      @endif
        </div>
        </div>
      </div>
      </nav>
    </div>
    </div>
  @endsection

  @push('after-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
  @endpush

  @push('after-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <script>
    $(function () {
      // Sembunyikan semua panel
      $(".lesson.accordion div[id]").hide();
      $(".lesson.accordion button img").removeClass("-rotate-180");

      // Buka panel yang punya class 'active-accordion'
      var $active = $(".lesson.accordion.active-accordion");
      if ($active.length) {
      $active.find("div[id]").show();
      $active.find("button img").addClass("-rotate-180");
      } else {
      // Jika tidak ada, buka panel pertama
      $(".lesson.accordion div[id]").first().show();
      $(".lesson.accordion button img").first().addClass("-rotate-180");
      }

      $("[data-expand]").on("click", function (e) {
      e.preventDefault();
      const $btn = $(this);
      const $img = $btn.children("img");
      const targetId = $btn.data("expand");
      const $targetPanel = $("#" + targetId);

      if ($targetPanel.is(":visible")) {
        $targetPanel.slideUp();
        $img.removeClass("-rotate-180");
      } else {
        $(".lesson.accordion div[id]").slideUp();
        $(".lesson.accordion button img").removeClass("-rotate-180");
        $targetPanel.slideDown();
        $img.addClass("-rotate-180");
      }
      });
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('pre').forEach(pre => {
      // Add the class 'tokyo-night' to each <pre> element
      pre.classList.add('theme-tokyo-night-dark');

      if (!pre.querySelector('code')) {
        // Wrap content in <code>
        const code = document.createElement('code');
        code.className = ''; // Leave empty for autodetection or add 'plaintext' for default
        code.textContent = pre.textContent.trim(); // Decode and clean up content
        pre.innerHTML = ''; // Clear existing content
        pre.appendChild(code); // Append <code> inside <pre>
      }
      });
      hljs.highlightAll(); // Apply Highlight.js
    });
    </script>
  @endpush