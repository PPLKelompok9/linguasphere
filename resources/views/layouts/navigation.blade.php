<nav x-data="{ open: false }" class="bg-white border-b border-obito-grey">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 shrink-0">
                        <img src="{{ asset('assets/logos/logo-64.svg') }}" class="flex shrink-0" alt="logo">
                        <span class="font-bold text-2xl tracking-wide">Linguasphere</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                @if (!request()->routeIs('profile.edit'))
                  <form action="#" class="relative mt-1.5">
                     <label class="group">
                        <input type="text" name="search" id="search" class="appearance-none outline-none ring-1 ring-obito-grey rounded-full w-[400px] py-[14px] px-5 bg-white font-bold placeholder:font-normal placeholder:text-obito-text-secondary group-focus-within:ring-obito-green transition-all duration-300 pr-[50px]" placeholder="Search course by name">
                        <button type="submit" class="absolute right-0 top-0 h-[52px] w-[52px] flex shrink-0 items-center justify-center">
                          <img src="{{ asset('assets/icons/search-normal-green-fill.svg') }}" class="flex shrink-0 w-10 h-10" alt="search">
                        </button>
                      </label>
                  </form>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div id="profile-dropdown" class="relative flex items-center gap-[14px]">
                        <div class="flex shrink-0 w-[50px] h-[50px] rounded-full overflow-hidden bg-obito-grey">
                            <img src="assets/images/sami.png" class="w-full h-full object-cover" alt="profil">
                        </div>
                        <div>
                            <p class="font-semibold text-lg">{{ Auth::user()->name }}</p>
                            
                        </div>
                        
                        <x-dropdown class="!bg-white" align="right" width="48">
                        <x-slot name="trigger">
                        <button id="dropdown-opener" class="flex shrink-0 w-6 h-6">
                            <img src="assets/icons/arrow-circle-down.svg" class="w-6 h-6" alt="icon">
                        </button>
                        </x-slot>
                        <x-slot name="content">
                        <x-dropdown-link class="hover:!bg-obito-green !text-obito-text-primary hover:!text-white" :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link class="hover:!bg-obito-green !text-obito-text-primary hover:!text-white" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                        </x-dropdown>
                    </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
