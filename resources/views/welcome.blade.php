<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Linguasphere</title>
  <meta name="description"
    content="Lingusphere is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  @endif

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/logos/logo-64.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/logos/logo-64.png') }}">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="Obito Online Learning Platform - Learn Anytime, Anywhere">
  <meta property="og:description"
    content="Obito is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">
  <meta property="og:image" content="{{ asset('assets/logos/logo-64-big.png') }}">
  <meta property="og:url" content="{{ url('/') }}">
  <meta property="og:type" content="website">
</head>

<body>
  <nav id="nav-guest" class="flex w-full bg-white border-b border-obito-grey">
    <div class="flex w-[1280px] px-[75px] py-5 items-center justify-between mx-auto">
      <div class="flex items-center gap-[50px]">
        <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0">
          <img src="{{ asset('assets/logos/logo-64.svg') }}" class="flex shrink-0" alt="logo">
          <span class="font-bold text-2xl tracking-wide">Linguasphere</span>
        </a>
        <ul class="flex items-center gap-10">
          <li class="hover:font-semibold transition-all duration-300 font-semibold">
            <a href="{{ url('/') }}">Home</a>
          </li>
          <li class="hover:font-semibold transition-all duration-300">
            <a href="{{ url('/pricing') }}">Courses</a>
          </li>
          <li class="hover:font-semibold transition-all duration-300">
            <a href="#">Learning Path</a>
          </li>
          {{-- <li class="hover:font-semibold transition-all duration-300">
            <a href="#">Pre-Test Language</a>
          </li> --}}
        </ul>
      </div>
      <div class="flex items-center gap-5 justify-end">
        <div class="h-[50px] flex shrink-0 bg-obito-grey w-px"></div>
        <div class="flex items-center gap-3">
          <a href="{{ url('/register') }}"
            class="rounded-full border border-obito-grey py-3 px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
            <span class="font-semibold">Sign Up</span>
          </a>
          <a href="{{ url('/login') }}"
            class="rounded-full py-3 px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
            <span class="font-semibold text-white">My Account</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <main class="flex flex-1 items-center py-[70px]">
    <div class="w-full flex gap-[77px] justify-between items-center pl-[calc(((100%-1280px)/2)+75px)]">
      <div class="flex flex-col max-w-[500px] gap-[50px]">
        <div class="flex flex-col gap-[30px]">
          <p class="flex items-center gap-[6px] w-fit rounded-full py-2 px-[14px] bg-obito-light-green">
            <img src="{{ asset('assets/icons/crown-green.svg') }}" class="flex shrink-0 w-5" alt="icon">
            <span class="font-bold text-sm">TRUSTED BY 500 FORTUNE LINGUASPHERE COMPANIES</span>
          </p>
          <div>
            <h1 class="font-extrabold text-[50px] leading-[65px]">Upgrade Skills, <br>Get Higher Salary</h1>
            <p class="leading-7 mt-[10px] text-obito-text-secondary">Materi terbaru disusun oleh professional dan
              perusahaan besar agar lebih sesuai kebutuhan dan anda lorem dolorsi.</p>
          </div>
          <div class="flex items-center gap-[18px]">
            <a href="{{ url('/pricing') }}"
              class="flex items-center rounded-full h-[67px] py-5 px-[30px] gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
              <span class="text-white font-semibold text-lg">Get Started</span>
            </a>
            <a href="#"
              class="flex items-center rounded-full h-[67px] border border-obito-grey py-5 px-[30px] bg-white gap-[10px] hover:border-obito-green transition-all duration-300">
              <img src="{{ asset('assets/icons/play-circle-fill.svg') }}" class="size-8 flex shrink-0" alt="icon">
              <span class="font-semibold text-lg">How It Works</span>
            </a>
          </div>
        </div>
        <div class="flex items-center gap-[14px]">
          <img src="{{ asset('assets/images/group.png') }}" class="flex shrink-0 h-[50px]" alt="group ">
          <div>
            <div class="flex gap-1 items-center">
              <div class="flex">
                <img src="{{ asset('assets/icons/Star 1.svg') }}" class="flex shrink-0 w-5" alt="star">
                <img src="{{ asset('assets/icons/Star 1.svg') }}" class="flex shrink-0 w-5" alt="star">
                <img src="{{ asset('assets/icons/Star 1.svg') }}" class="flex shrink-0 w-5" alt="star">
                <img src="{{ asset('assets/icons/Star 1.svg') }}" class="flex shrink-0 w-5" alt="star">
                <img src="{{ asset('assets/icons/Star 1.svg') }}" class="flex shrink-0 w-5" alt="star">
              </div>
              <span class="font-bold">5.0</span>
            </div>
            <p class="font-bold mt-1">Join Millions Developer</p>
          </div>
        </div>
      </div>
    </div>
    <div class="flex shrink-0 h-[590px] w-[666px] justify-end">
      <img src="{{ asset('assets/images/hero-image.png') }}" alt="hero">
    </div>
  </main>
</body>

</html>