<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>{{ config('app.name', 'Linguasphere') }}</title>


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Additional Styles -->
  @stack('styles')
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      {{ $header }}
      </div>
    </header>
  @endif

    <!-- Page Content -->
    <main>
      @hasSection('content')
      @yield('content')
    @else
      {{ $slot ?? '' }}
    @endif
    </main>
  </div>

  <!-- Additional Scripts -->
  @stack('scripts')
</body>

</html>