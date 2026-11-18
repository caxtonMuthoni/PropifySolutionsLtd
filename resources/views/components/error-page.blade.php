@props(['status', 'heading', 'message'])

<x-layouts.app :title="$heading">
    <section class="relative overflow-hidden pb-24 pt-36">
        <div class="container-page text-center">
            <p class="text-7xl font-semibold text-primary-600 sm:text-9xl dark:text-primary-400">{{ $status }}</p>
            <h1 class="mt-6 text-3xl font-semibold text-slate-950 sm:text-4xl dark:text-white">{{ $heading }}</h1>
            <p class="mx-auto mt-4 max-w-lg text-muted">{{ $message }}</p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('home') }}" class="btn-primary">Back to home</a>
                <a href="{{ route('services') }}" class="btn-secondary">Our services</a>
                <a href="{{ route('contact') }}" class="btn-secondary">Contact us</a>
            </div>
        </div>
    </section>
</x-layouts.app>
