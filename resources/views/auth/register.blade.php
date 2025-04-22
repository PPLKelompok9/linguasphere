<x-guest-layout>
  <form method="POST" action="{{ route('register') }}"
    class="flex flex-col h-fit w-[510px] shrink-0 rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
    @csrf

    <!-- Name -->
    <div class="flex flex-col gap-2 mt-4">
      <x-input-label for="name" :value="__('Name')" icon="assets/icons/profile.svg">
        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
          placeholder="Type your valid full name" />
      </x-input-label>
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="flex flex-col gap-2 mt-4">
      <x-input-label for="email" :value="__('Email Address')" icon="assets/icons/sms.svg">
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email"
          placeholder="Type your valid email address" />
      </x-input-label>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="flex flex-col gap-2 mt-4">
      <x-input-label for="password" :value="__('Password')" icon="assets/icons/shield-security.svg">
        <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
          placeholder="Type your password" />
      </x-input-label>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="flex flex-col gap-2 mt-4">
      <x-input-label for="password_confirmation" :value="__('Confirm Password')"
        icon="assets/icons/shield-security.svg">
        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
          autocomplete="new-password" placeholder="Type your password again" />
      </x-input-label>
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <a class="text-sm text-obito-green hover:underline" href="{{ route('login') }}">
        {{ __('Already registered?') }}
      </a>

      <x-primary-button class="ms-4">
        <span class="font-semibold text-white">{{ __('Register') }}</span>
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>