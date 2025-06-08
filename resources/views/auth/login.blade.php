<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}"
    class="flex flex-col h-fit w-[510px] shrink-0 rounded-[20px] border border-obito-grey p-5 gap-5 bg-white">
    @csrf

    <!-- Email Address -->
    <div class="flex flex-col gap-2">
      <x-input-label for="email" :value="__('Email Address')" icon="assets/images/icons/sms.svg">
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email"
          placeholder="Type your valid email address" />
      </x-input-label>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="flex flex-col gap-2">
      <x-input-label for="password" :value="__('Password')" icon="assets/images/icons/shield-security.svg">
        <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
          placeholder="Type your password" />
      </x-input-label>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded bg-white border-obito-grey text-obito-text-secondary shadow-sm focus:ring-obito-grey focus:ring-offset-obito-grey"
          name="remember">
        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-end gap-[13px]">
      @if (Route::has('password.request'))
      <a class="text-sm text-obito-green hover:underline" href="{{ route('password.request') }}">
      {{ __('Forgot your password?') }}
      </a>
    @endif

      <x-primary-button class="ms-3">
        <span class="font-semibold text-white">{{ __('Log in') }}</span>
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>