<x-app-layout>
  <nav id="bottom-nav" class="flex w-full bg-white border-b border-obito-grey py-[14px]">
    <ul class="flex w-full max-w-[1280px] px-[75px] mx-auto gap-3">
      <li class="group">
        <a href="#"
          class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
          <img src="assets/icons/home-trend-up.svg" class="flex shrink-0 w-5" alt="icon">
          <span>Overview</span>
        </a>
      </li>
      <li class="group active">
        <a href="#"
          class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
          <img src="assets/icons/note-favorite.svg" class="flex shrink-0 w-5" alt="icon">
          <span>Courses</span>
        </a>
      </li>
      <li class="group">
        <a href="#"
          class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
          <img src="assets/icons/message-programming.svg" class="flex shrink-0 w-5" alt="icon">
          <span>Quizzess</span>
        </a>
      </li>
      <li class="group">
        <a href="#"
          class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
          <img src="assets/icons/cup.svg" class="flex shrink-0 w-5" alt="icon">
          <span>Certificates</span>
        </a>
      </li>
      <li class="group">
        <a href="#"
          class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
          <img src="assets/icons/ruler&pen.svg" class="flex shrink-0 w-5" alt="icon">
          <span>Portfolios</span>
        </a>
      </li>
    </ul>
  </nav>

  <!-- <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          {{ __("You're logged in!") }}
        </div>
      </div>
    </div>
  </div> -->

  <main class="flex flex-col gap-10 pb-10 mt-[30px]">
    <section id="roadmap" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-4 mx-auto">
      <h2 class="font-bold text-[22px] leading-[33px]">Popular Roadmap</h2>
      <div class="grid grid-cols-2 gap-5">
        <a href="#" class="card">
          <div
            class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
            <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
              <img src="assets/thumbnails/thumbnail-1.png" class="w-full h-full object-cover" alt="thumbnail">
              <p
                class="absolute flex m-[10px] bottom-0 w-[calc(100%-20px)] items-center gap-0.5 bg-white rounded-[14px] py-[6px] px-2">
                <img src="assets/icons/cup.svg" class="flex shrink-0 w-5" alt="icon">
                <span class="font-semibold text-xs leading-[18px]">Featured In AI Industry Digital</span>
              </p>
            </div>
            <div class="flex flex-col gap-3">
              <h3 class="font-bold text-lg line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
              <p class="flex items-center gap-[6px]">
                <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                <span class="text-sm text-obito-text-secondary">Rp 125.500.000/year</span>
              </p>
              <p class="flex items-center gap-[6px]">
                <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                <span class="text-sm text-obito-text-secondary">18,498 Courses</span>
              </p>
            </div>
          </div>
        </a>
        <a href="#" class="card">
          <div
            class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
            <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
              <img src="assets/thumbnails/thumbnail-2.png" class="w-full h-full object-cover" alt="thumbnail">
              <p
                class="absolute flex m-[10px] bottom-0 w-[calc(100%-20px)] items-center gap-0.5 bg-white rounded-[14px] py-[6px] px-2">
                <img src="assets/icons/cup.svg" class="flex shrink-0 w-5" alt="icon">
                <span class="font-semibold text-xs leading-[18px]">Featured In AI Industry Digital</span>
              </p>
            </div>
            <div class="flex flex-col gap-3">
              <h3 class="font-bold text-lg line-clamp-2">Digital Marketing Enterprise User Acquisitions Level</h3>
              <p class="flex items-center gap-[6px]">
                <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                <span class="text-sm text-obito-text-secondary">Rp 125.500.000/year</span>
              </p>
              <p class="flex items-center gap-[6px]">
                <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                <span class="text-sm text-obito-text-secondary">18,498 Courses</span>
              </p>
            </div>
          </div>
        </a>
      </div>
    </section>
    <section id="catalog" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-4 mx-auto">
      <h1 class="font-bold text-[22px] leading-[33px]">Course Catalog</h1>
      <div id="tabs-container" class="flex items-center gap-3">
        <button type="button" class="tab-btn group active" data-target="programming">
          <p
            class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="group-[.active]:font-semibold group-[.active]:text-white">Programming</span>
          </p>
        </button>
        <button type="button" class="tab-btn group" data-target="example">
          <p
            class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="group-[.active]:font-semibold group-[.active]:text-white">Networking</span>
          </p>
        </button>
        <button type="button" class="tab-btn group" data-target="example">
          <p
            class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="group-[.active]:font-semibold group-[.active]:text-white">Digital Marketing</span>
          </p>
        </button>
        <button type="button" class="tab-btn group" data-target="example">
          <p
            class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="group-[.active]:font-semibold group-[.active]:text-white">Product Design</span>
          </p>
        </button>
        <button type="button" class="tab-btn group" data-target="example">
          <p
            class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="group-[.active]:font-semibold group-[.active]:text-white">Entrepreneurship</span>
          </p>
        </button>
      </div>
      <div id="tabs-content-container" class="mt-1">
        <div id="programming" class="tab-content grid grid-cols-4 gap-5">
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-3.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Cyber Security for Dummies 101</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-4.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Copywriting for New Z Generation Digitals</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Copywriting for New Z Generation Digitals</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-6.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">User Content Generation for Digital Marketing</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-7.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Machine Learning and VR Engineering 4Ds</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-8.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Start Digital Business for 2025 Ecosystem AI</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-9.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">UI UX Masterclass Figma Principles Design</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
        </div>
        <div id="example" class="tab-content grid grid-cols-4 gap-5 hidden">
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-3.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Cyber Security for Dummies 101</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Cyber Security for Dummies 101</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-4.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Cyber Security for Dummies 101</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-7.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Cyber Security for Dummies 101</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-6.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Cyber Security for Dummies 101</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-9.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Cyber Security for Dummies 101</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
          <a href="course-details.html" class="card">
            <div
              class="course-card flex flex-col rounded-[20px] border border-obito-grey hover:border-obito-green transition-all duration-300 bg-white overflow-hidden">
              <div class="thumbnail-container p-[10px]">
                <div class="relative w-full h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                  <img src="assets/thumbnails/thumbnail-8.png" class="w-full h-full object-cover" alt="thumbnail">
                  <p
                    class="absolute top-[10px] right-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5">
                    <img src="assets/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                  </p>
                </div>
              </div>
              <div class="flex flex-col p-4 pt-0 gap-[13px]">
                <h3 class="font-bold text-lg line-clamp-2">Cyber Security for Dummies 101</h3>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/crown-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Programming</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/menu-board-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">182 Lessons</span>
                </p>
                <p class="flex items-center gap-[6px]">
                  <img src="assets/icons/briefcase-green.svg" class="flex shrink-0 w-5" alt="icon">
                  <span class="text-sm text-obito-text-secondary">Ready to Work</span>
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>
  </main>
</x-app-layout>