<nav id="nav-auth" aria-label="nav-auth" class="flex w-full bg-white border-b border-obito-grey">
  <div class="flex w-[1280px] px-[75px] py-5 items-center justify-between mx-auto">
    <div class="flex items-center gap-[30px]">
      <a href="index.html" class="flex shrink-0 items-center gap-2">
        <img src="assets/logos/logo-64.svg" class="flex shrink-0" alt="logo">
        <h1 class="text-2xl tracking-wider font-bold">LinguaSphere</h1>
      </a>
    </div>
    <div class="flex items-center gap-5 justify-end">
      <div class="h-[50px] flex shrink-0 bg-obito-grey w-px"></div>
      <div id="profile-dropdown" class="relative flex items-center gap-[14px]">
        <div class="flex shrink-0 w-[50px] h-[50px] rounded-full overflow-hidden bg-obito-grey">
          <img src="assets/photos/sami.png" class="w-full h-full object-cover" alt="profile">
        </div>
        <div>
          <p class="font-semibold text-lg">
            @if(Auth::check())
        {{ Auth::user()->name }}
      @else
    Guest
  @endif
          </p>
        </div>
        <div class="hidden sm:flex sm:items-center">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button id="dropdown-opener" class="flex shrink-0 w-6 h-6">
                <img src="assets/icons/arrow-circle-down.svg" class="w-6 h-6" alt="icon">
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        </div>
        <div id="dropdown"
          class="absolute top-full right-0 mt-[7px] w-[170px] h-fit bg-white rounded-xl border border-obito-grey py-4 px-5 shadow-[0px_10px_30px_0px_#B8B8B840] z-10 hidden">
          <ul class="flex flex-col gap-[14px]">
            <li class="hover:text-obito-green transition-all duration-300">
              <a href="#">My Courses</a>
            </li>
            <li class="hover:text-obito-green transition-all duration-300">
              <a href="#">Certificates</a>
            </li>
            <li class="hover:text-obito-green transition-all duration-300">
              <a href="my-subscriptions.html">Subscriptions</a>
            </li>
            <li class="hover:text-obito-green transition-all duration-300">
              <a href="#">Settings</a>
            </li>
            <li class="hover:text-obito-green transition-all duration-300">
              <a href="index.html">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<nav id="bottom-nav" aria-label="bottom-nav" class="flex w-full bg-white border-b border-obito-grey py-[14px]">
  <ul class="flex w-full max-w-[1280px] px-[75px] mx-auto gap-3">
    <li class="group {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
      <a href="{{ route('home') }}"
        class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
        <img src="assets/icons/home-trend-up.svg" class="flex shrink-0 w-5" alt="icon">
        <span>Home</span>
      </a>
    </li>
    <li class="group {{ Route::currentRouteName() === 'courses' ? 'active' : '' }}">
      <a href="{{ route('courses') }}"
        class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
        <img src="assets/icons/note-favorite.svg" class="flex shrink-0 w-5" alt="icon">
        <span>Courses</span>
      </a>
    </li>
    <li class="group {{ Route::currentRouteName() === 'pretest' ? 'active' : '' }}">
      <a href="{{ route(name: 'pretest') }}"
        class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
        <img src="assets/icons/message-programming.svg" class="flex shrink-0 w-5" alt="icon">
        <span>Pre-Test</span>
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