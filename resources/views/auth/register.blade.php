<x-guest-layout>
  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
    class="flex flex-col h-fit w-[510px] shrink-0 rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
    @csrf

    <label class="relative flex items-center gap-3">
      <button id="upload-photo" type="button"
        class="relative w-[90px] h-[90px] flex rounded-full overflow-hidden border border-obito-grey focus:ring-obito-green transition-all duration-300">
        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 font-semibold text-sm">
          Add <br>Photo
        </span>
        <img id="photo-preview" src="" class="w-full h-full object-cover hidden" alt="profile">
      </button>
      <button id="delete-photo" type="button"
        class="rounded-full w-fit py-[6px] px-[10px] bg-obito-light-red font-bold text-xs text-obito-red hidden">DELETE
        PHOTO</button>
      <input id="hidden-input" type="file" accept="image/*" name="photo" class="absolute -z-10 opacity-0">
    </label>

    <!-- Name -->
    <div class="flex flex-col gap-2 mt-4">
      <x-input-label for="name" :value="__('Name')" icon="assets/images/icons/profile.svg">
        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
          placeholder="Type your valid full name" />
      </x-input-label>
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="flex flex-col gap-2 mt-4">
      <x-input-label for="email" :value="__('Email Address')" icon="assets/images/icons/sms.svg">
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email"
          placeholder="Type your valid email address" />
      </x-input-label>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="flex flex-col gap-2 mt-4">
      <x-input-label for="password" :value="__('Password')" icon="assets/images/icons/shield-security.svg">
        <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
          placeholder="Type your password" />
      </x-input-label>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="flex flex-col gap-2 mt-4">
      <x-input-label for="password_confirmation" :value="__('Confirm Password')"
        icon="assets/images/icons/shield-security.svg">
        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
          autocomplete="new-password" placeholder="Type your password again" />
      </x-input-label>
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4 gap-[13px]">
      <a class="text-sm text-obito-green hover:underline" href="{{ route('login') }}">
        {{ __('Already registered?') }}
      </a>

      <x-primary-button class="ms-4">
        <span class="font-semibold text-white">{{ __('Register') }}</span>
      </x-primary-button>
    </div>
  </form>

  <script>
    const fileInput = document.getElementById('hidden-input');
    const previewImg = document.getElementById('photo-preview');
    const addPhotoText = document.querySelector('#upload-photo span');
    const deletePhotoBtn = document.getElementById('delete-photo');

    document.getElementById('upload-photo').addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', (event) => {
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
          previewImg.src = e.target.result;
          previewImg.classList.remove('hidden');
          addPhotoText.classList.add('hidden');
          deletePhotoBtn.classList.remove('hidden');
        };

        reader.readAsDataURL(file);
      }
    });

    deletePhotoBtn.addEventListener('click', () => {
      fileInput.value = '';
      previewImg.src = '';
      previewImg.classList.add('hidden');
      addPhotoText.classList.remove('hidden');
      deletePhotoBtn.classList.add('hidden');
    });
  </script>
</x-guest-layout>