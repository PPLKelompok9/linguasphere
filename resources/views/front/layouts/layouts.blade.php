<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <meta name="description"
    content="Lingusphere is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">



  <!-- Styles / Scripts -->
  {{-- @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  @endif
  @stack('after-style') --}}
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  @stack('after-styles')

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logos/linguasphere.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/images/logos/linguasphere.png') }}">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- Open Graph Meta Tags -->
  <meta property="og:image" content="{{ asset('assets/logos/logo-64-big.png') }}">
  <meta property="og:url" content="{{ url('/') }}">
  <meta property="og:type" content="website">
</head>

<body>
  <x-nav-auth :user="auth()->user()" />
  @yield('content')
  <script src="{{asset('js/dropdown-navbar.js')}}"></script>
  <script src="{{asset('js/switching-tabs.js')}}"></script>
  <script src="{{asset('js/accordion.js')}}"></script>
  <script src="{{asset('js/tabs.js')}}"></script>
  @stack('after-scripts')
</body>

</html>