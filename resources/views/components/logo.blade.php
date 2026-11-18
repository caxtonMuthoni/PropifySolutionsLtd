@props(['inverted' => false])

<a href="{{ route('home') }}" {{ $attributes->merge(['class' => 'group inline-flex items-center gap-2.5 rounded-xl']) }} aria-label="Propify Solutions — home">
    <x-logo-mark class="h-9 w-9 shrink-0 transition-transform duration-300 group-hover:-rotate-6" />
    <span class="flex flex-col leading-none">
        <span @class(['text-[1.375rem] font-bold tracking-tight', 'text-white' => $inverted, 'text-ink-900 dark:text-white' => ! $inverted])>propify</span>
        <span @class(['mt-0.5 text-[0.56rem] font-semibold uppercase tracking-[0.32em]', 'text-slate-300' => $inverted, 'text-slate-500 dark:text-slate-400' => ! $inverted])>Solutions</span>
    </span>
</a>
