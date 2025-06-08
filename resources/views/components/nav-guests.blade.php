<nav id="nav-guest" class="flex w-full bg-white border-b border-obito-grey">
  <div class="flex w-[1280px] px-[75px] py-5 items-center justify-between mx-auto">
    <div class="flex items-center gap-[50px]">
      <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0">
        <img src="{{ asset('assets/images/logos/logo-64.svg') }}" class="flex shrink-0" alt="logo">
        <span class="font-bold text-2xl tracking-wide">Linguasphere</span>
      </a>
      <ul class="flex items-center gap-10">
        <li class="hover:font-semibold transition-all duration-300 {{ request()->is('/') ? 'font-semibold' : '' }}">
          <a href="{{ url('/') }}">Home</a>
        </li>
        <li
          class="hover:font-semibold transition-all duration-300 {{ request()->is('courses*') ? 'font-semibold' : '' }}">
          <a href="{{ route('courses.guest') }}">Courses</a>
        </li>
        <li
          class="hover:font-semibold transition-all duration-300 {{ request()->is('learning-path') ? 'font-semibold' : '' }}">
          <a href="{{ route('paths.guest') }}">Learning Path</a>
        </li>
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