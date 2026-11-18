@props(['testimonials'])

<ul {{ $attributes->merge(['class' => 'grid gap-6 md:grid-cols-2']) }}>
    @foreach ($testimonials as $testimonial)
        <li>
            <figure class="card flex h-full flex-col p-8">
                <x-icon name="quote" class="h-8 w-8 text-primary-200 dark:text-primary-800" />
                <blockquote class="mt-4 flex-1 text-lg leading-relaxed text-slate-700 dark:text-slate-300">“{{ $testimonial['content'] }}”</blockquote>
                <figcaption class="mt-6 flex items-center gap-3 border-t border-slate-200 pt-6 dark:border-white/10">
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-gradient-to-br from-primary-500 to-primary-700 font-semibold text-white" aria-hidden="true">{{ mb_substr($testimonial['name'], 0, 1) }}</span>
                    <span>
                        <span class="block font-semibold text-slate-950 dark:text-white">{{ $testimonial['name'] }}</span>
                        <span class="block text-sm text-muted">{{ $testimonial['company'] }}</span>
                    </span>
                </figcaption>
            </figure>
        </li>
    @endforeach
</ul>
