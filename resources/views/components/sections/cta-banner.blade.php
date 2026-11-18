@props(['title' => 'Ready to start?', 'description' => "Let's discuss how we can bring your idea to life — and get it in front of customers fast."])

@php
    $highlights = [
        ['title' => '30 minutes', 'body' => 'Quick and focused', 'icon' => 'clock'],
        ['title' => '1-on-1 with an engineer', 'body' => 'Personal, technical attention', 'icon' => 'users'],
        ['title' => 'Free consultation', 'body' => 'No commitment required', 'icon' => 'badge-check'],
    ];
@endphp

<section class="relative overflow-hidden bg-ink-950 text-white" aria-labelledby="cta-heading">
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute -bottom-40 left-1/2 h-96 w-[48rem] -translate-x-1/2 rounded-full bg-teal-500/20 blur-3xl"></div>
        <div class="absolute -left-20 top-0 h-80 w-80 rounded-full bg-primary-600/30 blur-3xl"></div>
    </div>
    <div class="container-page relative grid gap-12 py-20 lg:grid-cols-2 lg:py-28">
        <div class="flex flex-col justify-between gap-10">
            <div>
                <h2 id="cta-heading" class="text-4xl font-semibold sm:text-5xl">{{ $title }}</h2>
                <p class="mt-5 max-w-md text-lg text-slate-300">{{ $description }}</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('contact', ['type' => 'call']) }}" class="btn-primary !px-7 !py-4 text-base">
                    <x-icon name="calendar-days" class="h-5 w-5" /> Schedule a Call <x-icon name="arrow-right" class="h-5 w-5" />
                </a>
                <a href="{{ $site['contact']['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="btn border border-white/15 bg-white/5 !px-7 !py-4 text-base text-white hover:bg-white/10">
                    <x-icon name="message-circle" class="h-5 w-5" /> Chat on WhatsApp
                </a>
            </div>
        </div>
        <div>
            <h3 class="text-xl font-semibold">Book a 30-minute call to discuss your project</h3>
            <p class="mt-3 text-slate-300">No sales pitch — a technical conversation about your requirements, timeline and how we can help you succeed.</p>
            <ul class="mt-6 flex flex-col gap-3">
                @foreach ($highlights as $item)
                    <li class="flex items-center gap-4 rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-accent-500 to-primary-600 shadow-glow"><x-icon :name="$item['icon']" class="h-5 w-5" /></span>
                        <span>
                            <span class="block font-semibold">{{ $item['title'] }}</span>
                            <span class="block text-sm text-slate-400">{{ $item['body'] }}</span>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
