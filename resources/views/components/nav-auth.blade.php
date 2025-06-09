@props(['user'])
<nav id="nav-auth" class="flex w-full bg-white border-b border-obito-grey">
  <div class="flex w-[1280px] px-[75px] py-5 items-center justify-between mx-auto">
    <div class="flex items-center gap-[5rem]">
      <a href="#" class="flex shrink-0">
        <img src="{{ asset('assets/images/logos/linguasphere.png') }}" class="flex shrink-0 w-[70px]" alt="logo">
      </a>
      <ul class="flex items-center gap-10">
        <li
          class="hover:font-semibold transition-all duration-300 {{ request()->routeIs('dashboard.user') ? 'font-semibold ' : '' }}">
          <a href="{{ route('dashboard.user') }}">Home</a>
        </li>
        <li
          class="hover:font-semibold transition-all duration-300 {{ request()->routeIs('course*') || request()->routeIs('courses.detail') ? 'font-semibold ' : '' }}">
          <a href="{{ route('courses.user') }}">Course</a>
        </li>

        <li
          class="hover:font-semibold transition-all duration-300 {{ request()->routeIs('pretest*') || request()->routeIs('pretest.test') ? 'font-semibold ' : '' }}">
          <a href="{{ route('pretest') }}">PreTest</a>
        </li>
        <li
          class="hover:font-semibold transition-all duration-300 {{ request()->routeIs('paths*') || request()->routeIs('paths.index') ? 'font-semibold ' : '' }}">
          <a href="{{ route('paths.index') }}">Roadmap</a>
        </li>
        <li
          class="hover:font-semibold transition-all duration-300 {{ request()->routeIs('scholarships*') || request()->routeIs('scholarships.index') ? 'font-semibold ' : '' }}">
          <a href="{{ route('scholarships.index') }}">Scholarship</a>
        </li>
      </ul>
    </div>
    <div class="flex items-center gap-5 justify-end">
      <div class="h-[50px] flex shrink-0 bg-obito-grey w-px"></div>
      <div id="profile-dropdown" class="relative flex items-center gap-[14px]">
        <div class="flex shrink-0 w-[50px] h-[50px] rounded-full overflow-hidden bg-obito-grey">
          <img src="{{ $user->photo }}" class="w-full h-full object-cover" alt="profile">
        </div>
        <div>
          <p class="font-semibold text-lg">{{ $user->name }}</p>
          <p class="text-sm text-obito-text-secondary">{{ $user->occupation }}</p>
        </div>
        <button id="dropdown-opener" class="flex shrink-0 w-6 h-6">
          <img src="{{ asset('assets/images/icons/arrow-circle-down.svg') }}" class="w-6 h-6" alt="icon">
        </button>
        <div id="dropdown"
          class="absolute top-full right-0 mt-[7px] w-fit h-fit bg-white rounded-xl border border-obito-grey py-4 px-5 shadow-[0px_10px_30px_0px_#B8B8B840] z-10 hidden">
          <ul class="flex flex-col gap-[14px]">
            <li class="hover:text-obito-green transition-all duration-300"><a href={{ route('setting.edit') }}>Settings</a>
            </li>
            <li class="hover:text-obito-green transition-all duration-300"><a href={{ route('subscriptions.history') }}>Subscriptions</a>
            <li class="hover:text-obito-green transition-all duration-300">

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                  {{ __('Logout') }}
                </a>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>