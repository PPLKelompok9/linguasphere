@extends('front.layouts.layouts')
@section('content')
  <main class="pb-10 mt-[30px]">
    <section class="pl-[calc(((100%-1280px)/2)+75px)] pr-[calc(((100%-1280px)/2)+75px)] flex flex-col gap-10">
    <header
      class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
      <div id="thumbnail-container"
      class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="{{ asset('storage/' . $course->cover) }}" class="w-full h-full object-fill" alt="thumbnail">
      </div>
      <div id="course-info" class="flex flex-col justify-center gap-[30px]">
      <div class="flex flex-col gap-[10px]">
        <h1 class="font-bold text-[28px] leading-[42px]">{{ $course->name }}</h1>
      </div>
      <div class="flex flex-col gap-4">
        <div class="flex items-center gap-10">
        <p class="flex items-center justify-between w-full">
          <img src="/assets/icons/crown-green.svg" class="w-6 flex shrink-0" alt="icon">
          <span class="font-semibold text-sm leading-[21px] w-full ml-2">{{ $course->category->name }}</span>
        </p>
        <p class="flex items-center justify-between w-full">
          <img src="/assets/icons/menu-board-green.svg" class="w-6 flex shrink-0" alt="icon">
          <span class="font-semibold text-sm leading-[21px] w-full ml-2">{{ $course->total_students }}
          student</span>
        </p>
        </div>
        <div class="flex items-center gap-10">
        <p class="flex items-center justify-between w-full">
          <img src="/assets/icons/buildings-green-fill.svg" class="w-6 flex shrink-0" alt="icon">
          <span class="font-semibold text-sm leading-[21px] w-full ml-2">{{ $course->agency->name }}</span>
        </p>
        <p class="flex items-center justify-between w-full">
          <img src="/assets/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
          <span class="font-semibold text-sm leading-[21px] w-full ml-2 capitalize">{{ $course->level }}</span>
        </p>
        </div>
      </div>
      <a href="{{ route('courses.checkout', $course['slug'])}}" class=" rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all
      duration-300 text-center">
        <span class="font-semibold text-white">Start Learning Now</span>
      </a>
      </div>
    </header>
    <section id="details" class="flex flex-col w-full max-w-[1000px] gap-4 mx-auto">
      <h2 class="font-bold text-[22px] leading-[33px]">Upgrade Your Skills</h2>
      <div id="contents" class="flex flex-col gap-5">
      <div id="tabs-container" class="flex items-center gap-3">
        <button type="button" class="tab-btn group active" data-target="about-content">
        <p
          class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
          <span class="font-semibold group-[.active]:text-white">About</span>
        </p>
        </button>
        <button type="button" class="tab-btn group" data-target="lessons-content">
        <p
          class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
          <span class="font-semibold group-[.active]:text-white">Lessons</span>
        </p>
        </button>
        <button type="button" class="tab-btn group" data-target="testimonials-content">
        <p
          class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
          <span class="font-semibold group-[.active]:text-white">Testimonials</span>
        </p>
        </button>
      </div>
      <div id="tabs-content-container">
        <div id="about-content" class="tab-content flex flex-col gap-[30px]">
        <div id="description" class="flex flex-col gap-4 leading-7 w-full text-justify max-w-[844px]">
          {{ $course->description }}
        </div>
        <div id="what-you-learn" class="flex flex-col gap-4">
          <h3 class="font-semibold text-lg">What Will You Learn</h3>
          <div class="grid grid-cols-2 gap-x-[30px] gap-y-4 w-full max-w-[700px]">
          @foreach ($learn as $item)
        <div class="flex items-center gap-3">
        <img src="/assets/icons/tick-circle-green-fill.svg" class="w-6 flex shrink-0" alt="icon">
        <p>{{ $item }}</p>
        </div>
      @endforeach
          </div>
        </div>
        <div id="instructors"
          class="flex flex-col w-full max-w-[900px] rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
          <h3 class="font-semibold text-lg">Course Instructors</h3>
          <div class="grid grid-cols-2 gap-5">
          @foreach ($instructor as $teacher)
        <div class="instructors-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
        <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
          <img src="{{ asset($teacher['photo']) }}" class="w-full h-full object-cover"
          alt="{{ $teacher['name'] }}">
          </div>
          <div>
          <p class="font-semibold">{{ $teacher['name'] }}</p>
          </div>
        </div>
        <div class="flex items-center">
          <img src="/assets/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="/assets/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="/assets/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="/assets/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="/assets/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
        </div>
        </div>
        <hr class="border-obito-grey">
        <p class="leading-7 text-justify">{{ $teacher['description'] }}</p>
        </div>
      @endforeach
          </div>
        </div>
        </div>
        <div id="lessons-content" class="tab-content flex flex-col gap-5 w-full max-w-[650px] hidden">
        <div class="accordion flex flex-col gap-4 rounded-[20px] border border-obito-grey p-5 bg-white">
          <button type="button" id="accordion-btn" data-expand="WarmingUp"
          class="flex items-center justify-between">
          <p class="font-semibold text-lg">Warming Up</p>
          <img src="assets/images/icons/arrow-circle-down.svg" alt="icon"
            class="size-6 shrink-0 transition-all duration-300 -rotate-180" />
          </button>
          <div id="WarmingUp" class="">
          <div class="flex flex-col gap-4">
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Demo Project</p>
            </div>
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Software Installation</p>
            </div>
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Download Source Code</p>
            </div>
          </div>
          </div>
        </div>
        <div class="accordion flex flex-col gap-4 rounded-[20px] border border-obito-grey p-5 bg-white">
          <button type="button" id="accordion-btn" data-expand="NewProject"
          class="flex items-center justify-between">
          <p class="font-semibold text-lg">New Project Coming</p>
          <img src="assets/images/icons/arrow-circle-down.svg" alt="icon"
            class="size-6 shrink-0 transition-all duration-300" />
          </button>
          <div id="NewProject" class="hidden">
          <div class="flex flex-col gap-4">
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Demo Project</p>
            </div>
          </div>
          </div>
        </div>
        <div class="accordion flex flex-col gap-4 rounded-[20px] border border-obito-grey p-5 bg-white">
          <button type="button" id="accordion-btn" data-expand="DeepDive" class="flex items-center justify-between">
          <p class="font-semibold text-lg">Deep Dive into coding</p>
          <img src="assets/images/icons/arrow-circle-down.svg" alt="icon"
            class="size-6 shrink-0 transition-all duration-300" />
          </button>
          <div id="DeepDive" class="hidden">
          <div class="flex flex-col gap-4">
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">AB Testing Heading Website</p>
            </div>
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Marketing AI Integration</p>
            </div>
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Get API Key Permissions</p>
            </div>
          </div>
          </div>
        </div>
        <div class="accordion flex flex-col gap-4 rounded-[20px] border border-obito-grey p-5 bg-white">
          <button type="button" id="accordion-btn" data-expand="NewProject2"
          class="flex items-center justify-between">
          <p class="font-semibold text-lg">New Project Coming</p>
          <img src="assets/images/icons/arrow-circle-down.svg" alt="icon"
            class="size-6 shrink-0 transition-all duration-300" />
          </button>
          <div id="NewProject2" class="hidden">
          <div class="flex flex-col gap-4">
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Demo Project</p>
            </div>
          </div>
          </div>
        </div>
        <div class="accordion flex flex-col gap-4 rounded-[20px] border border-obito-grey p-5 bg-white">
          <button type="button" id="accordion-btn" data-expand="DeepDive2"
          class="flex items-center justify-between">
          <p class="font-semibold text-lg">Deep Dive into coding</p>
          <img src="assets/images/icons/arrow-circle-down.svg" alt="icon"
            class="size-6 shrink-0 transition-all duration-300" />
          </button>
          <div id="DeepDive2" class="hidden">
          <div class="flex flex-col gap-4">
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">AB Testing Heading Website</p>
            </div>
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Marketing AI Integration</p>
            </div>
            <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
            <img src="assets/images/icons/menu-board.svg" class="size-6 flex shrink-0" alt="icon">
            <p class="font-semibold">Get API Key Permissions</p>
            </div>
          </div>
          </div>
        </div>
        </div>
        <div id="testimonials-content" class="tab-content grid grid-cols-2 w-full max-w-[860px] gap-5 hidden">
        <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
          <div class="flex items-center">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          </div>
          <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini
          proses adaptasi jadi lebih cepat dan produktif.</p>
          <div class="flex items-center gap-3">
          <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
            <img src="assets/images/photos/sami.png" class="w-full h-full object-cover" alt="photo">
          </div>
          <div>
            <p class="font-semibold">Angga Risky</p>
            <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
          </div>
          </div>
        </div>
        <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
          <div class="flex items-center">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          </div>
          <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini
          proses adaptasi jadi lebih cepat dan produktif.</p>
          <div class="flex items-center gap-3">
          <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
            <img src="assets/images/photos/4thPerson.png" class="w-full h-full object-cover" alt="photo">
          </div>
          <div>
            <p class="font-semibold">Angga Risky</p>
            <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
          </div>
          </div>
        </div>
        <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
          <div class="flex items-center">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          </div>
          <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini
          proses adaptasi jadi lebih cepat dan produktif.</p>
          <div class="flex items-center gap-3">
          <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
            <img src="assets/images/photos/anggaphoto.png" class="w-full h-full object-cover" alt="photo">
          </div>
          <div>
            <p class="font-semibold">Angga Risky</p>
            <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
          </div>
          </div>
        </div>
        <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
          <div class="flex items-center">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          </div>
          <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini
          proses adaptasi jadi lebih cepat dan produktif.</p>
          <div class="flex items-center gap-3">
          <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
            <img src="assets/images/photos/sami.png" class="w-full h-full object-cover" alt="photo">
          </div>
          <div>
            <p class="font-semibold">Angga Risky</p>
            <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
          </div>
          </div>
        </div>
        <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
          <div class="flex items-center">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          </div>
          <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini
          proses adaptasi jadi lebih cepat dan produktif.</p>
          <div class="flex items-center gap-3">
          <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
            <img src="assets/images/photos/5thPerson.png" class="w-full h-full object-cover" alt="photo">
          </div>
          <div>
            <p class="font-semibold">Angga Risky</p>
            <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
          </div>
          </div>
        </div>
        <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
          <div class="flex items-center">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          </div>
          <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini
          proses adaptasi jadi lebih cepat dan produktif.</p>
          <div class="flex items-center gap-3">
          <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
            <img src="assets/images/photos/anggaphoto.png" class="w-full h-full object-cover" alt="photo">
          </div>
          <div>
            <p class="font-semibold">Angga Risky</p>
            <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
          </div>
          </div>
        </div>
        <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
          <div class="flex items-center">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          <img src="assets/images/icons/Star 1.svg" class="w-5 flex shrink-0" alt="icon">
          </div>
          <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini
          proses adaptasi jadi lebih cepat dan produktif.</p>
          <div class="flex items-center gap-3">
          <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
            <img src="assets/images/photos/3rdPerson.png" class="w-full h-full object-cover" alt="photo">
          </div>
          <div>
            <p class="font-semibold">Angga Risky</p>
            <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
          </div>
          </div>
        </div>
        </div>
        <div id="example" class="tab-content hidden">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, sapiente?</p>
        </div>
      </div>
      </div>
    </section>
    </section>
  </main>
@endsection