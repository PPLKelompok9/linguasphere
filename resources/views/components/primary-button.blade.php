<button {{ $attributes->merge(['type' => 'submit', 'class' => 'class="flex items-center justify-center gap-[10px] rounded-full py-[14px] px-5 bg-obito-green hover:drop-shadow-effect transition-all duration-300"']) }}>
  {{ $slot }}
</button>