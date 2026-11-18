@props(['service'])

<a href="{{ route('services.show', $service['slug']) }}" class="group card flex h-full flex-col p-6 transition duration-300 hover:-translate-y-1 hover:border-primary-200 hover:shadow-glow dark:hover:border-primary-800">
    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-primary-500 to-primary-700 text-white shadow-glow">
        <x-service-icon :name="$service['icon']" class="h-5 w-5" />
    </span>
    <h3 class="mt-6 text-lg font-semibold text-slate-950 dark:text-white">{{ $service['title'] }}</h3>
    <p class="mt-2 flex-1 text-sm leading-relaxed text-muted">{{ $service['summary'] }}</p>
    <span class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 dark:text-primary-400">
        Learn more <x-icon name="arrow-up-right" class="h-4 w-4 transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5" />
    </span>
</a>
