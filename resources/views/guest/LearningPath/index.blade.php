@extends('welcome')

@section('content')

  <main class="flex flex-col gap-[30px] pb-10 mt-[30px]">
    <section
    class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
    <div id="thumbnail-container"
      class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
      <p
      class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
      <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
      <span class="font-semibold text-xs">4.8</span>
      </p>
      <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
      <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
      </button>
    </div>
    <div id="course-info" class="flex flex-col justify-center gap-[30px]">
      <div class="flex flex-col gap-[10px]">
      <h1 class="font-bold text-[28px] leading-[42px]">Introduction to British English</h1>
      </div>
      <div class="flex flex-col gap-4">
      <p class="flex items-center gap-[6px]">
        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
      </p>
      </div>
      <div class="flex items-center gap-3">
      <a href="success-join.html"
        class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
        <span class="font-semibold text-white">Mulai Belajar</span>
      </a>
      <a href="#"
        class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
        <span class="font-semibold">Add to Bookmark</span>
      </a>
      </div>
    </div>
    </section>
    <section
    class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
    <div id="thumbnail-container"
      class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
      <p
      class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
      <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
      <span class="font-semibold text-xs">4.8</span>
      </p>
      <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
      <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
      </button>
    </div>
    <div id="course-info" class="flex flex-col justify-center gap-[30px]">
      <div class="flex flex-col gap-[10px]">
      <h1 class="font-bold text-[28px] leading-[42px]">Basic Grammar Essentials</h1>
      </div>
      <div class="flex flex-col gap-4">
      <p class="flex items-center gap-[6px]">
        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
      </p>
      </div>
      <div class="flex items-center gap-3">
      <a href="success-join.html"
        class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
        <span class="font-semibold text-white">Mulai Belajar</span>
      </a>
      <a href="#"
        class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
        <span class="font-semibold">Add to Bookmark</span>
      </a>
      </div>
    </div>
    </section>
    <section
    class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
    <div id="thumbnail-container"
      class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
      <p
      class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
      <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
      <span class="font-semibold text-xs">4.8</span>
      </p>
      <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
      <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
      </button>
    </div>
    <div id="course-info" class="flex flex-col justify-center gap-[30px]">
      <div class="flex flex-col gap-[10px]">
      <h1 class="font-bold text-[28px] leading-[42px]">Vocabulary Building</h1>
      </div>
      <div class="flex flex-col gap-4">
      <p class="flex items-center gap-[6px]">
        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
      </p>
      </div>
      <div class="flex items-center gap-3">
      <a href="success-join.html"
        class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
        <span class="font-semibold text-white">Mulai Belajar</span>
      </a>
      <a href="#"
        class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
        <span class="font-semibold">Add to Bookmark</span>
      </a>
      </div>
    </div>
    </section>
    <section
    class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
    <div id="thumbnail-container"
      class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
      <p
      class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
      <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
      <span class="font-semibold text-xs">4.8</span>
      </p>
      <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
      <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
      </button>
    </div>
    <div id="course-info" class="flex flex-col justify-center gap-[30px]">
      <div class="flex flex-col gap-[10px]">
      <h1 class="font-bold text-[28px] leading-[42px]">Speaking Exercise</h1>
      </div>
      <div class="flex flex-col gap-4">
      <p class="flex items-center gap-[6px]">
        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
      </p>
      </div>
      <div class="flex items-center gap-3">
      <a href="success-join.html"
        class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
        <span class="font-semibold text-white">Mulai Belajar</span>
      </a>
      <a href="#"
        class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
        <span class="font-semibold">Add to Bookmark</span>
      </a>
      </div>
    </div>
    </section>
    <section
    class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
    <div id="thumbnail-container"
      class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
      <p
      class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
      <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
      <span class="font-semibold text-xs">4.8</span>
      </p>
      <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
      <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
      </button>
    </div>
    <div id="course-info" class="flex flex-col justify-center gap-[30px]">
      <div class="flex flex-col gap-[10px]">
      <h1 class="font-bold text-[28px] leading-[42px]">Writing Exercise</h1>
      </div>
      <div class="flex flex-col gap-4">
      <p class="flex items-center gap-[6px]">
        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
      </p>
      </div>
      <div class="flex items-center gap-3">
      <a href="success-join.html"
        class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
        <span class="font-semibold text-white">Mulai Belajar</span>
      </a>
      <a href="#"
        class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
        <span class="font-semibold">Add to Bookmark</span>
      </a>
      </div>
    </div>
    </section>
    <section
    class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
    <div id="thumbnail-container"
      class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
      <p
      class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
      <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
      <span class="font-semibold text-xs">4.8</span>
      </p>
      <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
      <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
      </button>
    </div>
    <div id="course-info" class="flex flex-col justify-center gap-[30px]">
      <div class="flex flex-col gap-[10px]">
      <h1 class="font-bold text-[28px] leading-[42px]">Conversation & Presentation</h1>
      </div>
      <div class="flex flex-col gap-4">
      <p class="flex items-center gap-[6px]">
        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
        <span class="font-semibold text-xl leading-[21px]">Intermediate</span>
      </p>
      </div>
      <div class="flex items-center gap-3">
      <a href="success-join.html"
        class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
        <span class="font-semibold text-white">Mulai Belajar</span>
      </a>
      <a href="#"
        class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
        <span class="font-semibold">Add to Bookmark</span>
      </a>
      </div>
    </div>
    </section>
  </main>

@endsection