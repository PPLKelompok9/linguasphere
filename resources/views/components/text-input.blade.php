@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'appearance-none outline-none w-full rounded-full border border-obito-grey py-[14px] px-5 pl-12 font-semibold placeholder:font-normal placeholder:text-obito-text-secondary group-focus-within:border-obito-green transition-all duration-300']) }}>