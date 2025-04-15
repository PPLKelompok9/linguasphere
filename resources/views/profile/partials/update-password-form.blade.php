<section>
    <header>
        <h2 class="text-lg font-medium text-obito-text-primary">
        <h2 class="text-lg font-medium ">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="flex flex-col gap-2">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" icon="assets/icons/shield-security.svg">
            <x-text-input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
            placeholder="Type your password" />
            </x-input-label>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
         </div>

        <div class="flex flex-col gap-2">
            <x-input-label for="update_password_password" :value="__('New Password')" icon="assets/icons/shield-security.svg">
            <x-text-input id="update_password_password" name="password" type="password" autocomplete="new-password"
            placeholder="Type your new password" />
            </x-input-label>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
         </div>

        <div class="flex flex-col gap-2">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" icon="assets/icons/shield-security.svg">
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
            placeholder="Type your new password confirmation" />
            </x-input-label>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
         </div>

        <div class="flex items-center gap-4">
            <x-primary-button>
            <span class="font-semibold text-white">{{ __('Save') }}</span>
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
