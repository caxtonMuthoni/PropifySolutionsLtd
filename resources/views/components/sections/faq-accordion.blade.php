@props(['faqs', 'openFirst' => true])

<div {{ $attributes->merge(['class' => 'divide-y divide-slate-200 border-y border-slate-200 dark:divide-white/10 dark:border-white/10']) }}>
    @foreach ($faqs as $faq)
        <details class="group py-6" @if ($loop->first && $openFirst) open @endif>
            <summary class="flex cursor-pointer list-none items-start justify-between gap-6 [&::-webkit-details-marker]:hidden">
                <h3 class="text-lg font-medium text-slate-950 sm:text-xl dark:text-white">{{ $faq['question'] }}</h3>
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 transition group-open:rotate-180 dark:border-white/10 dark:bg-white/5 dark:text-slate-300">
                    <x-icon name="chevron-down" class="h-4 w-4" />
                </span>
            </summary>
            <p class="mt-4 max-w-3xl leading-relaxed text-muted">{{ $faq['answer'] }}</p>
        </details>
    @endforeach
</div>
