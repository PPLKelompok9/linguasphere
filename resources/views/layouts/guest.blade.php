<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Sign In LinguaSphere</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  @stack('after-styles')
  <!-- Scripts -->
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-sans text-gray-900 antialiased">
  <div class="min-h-screen h-screen">
    <div class="relative flex flex-1 h-full">
      <section class="flex flex-1 items-center py-5 px-5 pl-[calc(((100%-1280px)/2)+75px)]">
        {{ $slot }}
      </section>
      <div class="relative flex w-1/2 shrink-0">
        <div id="background-banner" class="absolute flex w-full h-full overflow-hidden">
          <img src="assets/images/banner-subscription.png" class="w-full h-full object-cover" alt="banner">
        </div>
      </div>
    </div>
  </div>
</body>

</html>