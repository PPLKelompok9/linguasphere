@props(['user'])
<nav id="nav-auth" class="flex w-full bg-white border-b border-obito-grey">
    <div class="flex w-[1280px] px-[75px] py-5 items-center justify-between mx-auto">
        <div class="flex items-center gap-[15rem]">
            <a href="#" class="flex shrink-0">
                <img src="{{ asset('assets/images/logos/linguasphere.png') }}" class="flex shrink-0 w-[70px]" alt="logo">
            </a>
            <ul class="flex items-center gap-10">
                        <li class="hover:font-semibold transition-all duration-300 font-semibold">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="hover:font-semibold transition-all duration-300">
                            <a href="pricing.html">Course</a>
                        </li>
                        <li class="hover:font-semibold transition-all duration-300">
                            <a href="#">Sertification</a>
                        </li>
                        <li class="hover:font-semibold transition-all duration-300">
                            <a href="#">Roadmap</a>
                        </li>
                    </ul>
        </div>
        <div class="flex items-center gap-5 justify-end">
            <div class="h-[50px] flex shrink-0 bg-obito-grey w-px"></div>
            <div id="profile-dropdown" class="relative flex items-center gap-[14px]">
                <div class="flex shrink-0 w-[50px] h-[50px] rounded-full overflow-hidden bg-obito-grey">
                    <img src="" class="w-full h-full object-cover" alt="photo">
                </div>
                <div>
                    <p class="font-semibold text-lg">{{ $user->name }}</p>
                    <p class="text-sm text-obito-text-secondary">{{ $user->occupation }}</p>
                </div>
                <button id="dropdown-opener" class="flex shrink-0 w-6 h-6">
                    <img src="{{ asset('assets/images/icons/arrow-circle-down.svg') }}" class="w-6 h-6" alt="icon">
                </button>
                <div id="dropdown" class="absolute top-full right-0 mt-[7px] w-[170px] h-fit bg-white rounded-xl border border-obito-grey py-4 px-5 shadow-[0px_10px_30px_0px_#B8B8B840] z-10 hidden">
                    <ul class="flex flex-col gap-[14px]">
                        <li class="hover:text-obito-green transition-all duration-300">
                            <a href="{{ route('dashboard') }}">My Courses</a>
                        </li>
                        <li class="hover:text-obito-green transition-all duration-300">
                            <a href="#">Certificates</a>
                        </li>
                        <li class="hover:text-obito-green transition-all duration-300">
                            <a href="{{ route('dashboard.subscriptions') }}">Subscriptions</a>
                        </li>
                        <li class="hover:text-obito-green transition-all duration-300">
                            <a href="#">Settings</a>
                        </li>
                        <li class="hover:text-obito-green transition-all duration-300">

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')"
                                        onclick="event.preventDefault();
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
