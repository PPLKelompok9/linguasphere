<x-guest-layout>

  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('password.email') }}"
    class="flex flex-col h-fit w-[510px] shrink-0 rounded-[20px] border border-obito-grey p-5 gap-5 bg-white">
    @csrf

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
      {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Email Address -->
    <div class="flex flex-col gap-2">
      <x-input-label for="email" :value="__('Email Address')" icon="assets/icons/sms.svg">
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
          autocomplete="username" placeholder="Type your valid email address" />
      </x-input-label>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <x-primary-button>
        <span class="font-semibold text-white">{{ __('Email Password Reset Link') }}</span>
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>