@props(['value', 'icon' => null, 'for' => null])

@if ($value)
  <p class="font-semibold text-obito-text-primary">{{ $value }}</p>
@endif
<label for="{{ $for }}" class="relative group">
  {{ $slot }}
  @if ($icon)
    <img src="{{ $icon }}" class="absolute size-5 flex shrink-0 transform -translate-y-1/2 top-1/2 left-5" alt="icon">
  @endif
</label>