@php
    $aiTools = [
        ['label' => 'AI', 'color' => 'text-orange-500'],
        ['label' => '</>', 'color' => 'text-primary-600'],
        ['label' => 'CI', 'color' => 'text-emerald-600'],
        ['label' => 'QA', 'color' => 'text-fuchsia-600'],
        ['label' => 'API', 'color' => 'text-sky-600'],
        ['label' => 'UX', 'color' => 'text-rose-500'],
    ];
    $paymentMethods = [
        ['label' => 'M-PESA', 'color' => 'from-green-500 to-emerald-700'],
        ['label' => 'VISA', 'color' => 'from-indigo-800 to-blue-900'],
        ['label' => 'Mastercard', 'color' => 'from-red-500 to-orange-500'],
        ['label' => 'Bank transfer', 'color' => 'from-slate-700 to-slate-900'],
        ['label' => 'Paystack', 'color' => 'from-sky-500 to-cyan-600'],
        ['label' => 'Wire (USD)', 'color' => 'from-primary-500 to-primary-700'],
    ];
@endphp

<div {{ $attributes->merge(['class' => 'grid overflow-hidden rounded-3xl border border-slate-200/80 lg:grid-cols-6 dark:border-white/10']) }}>
    <article class="relative overflow-hidden bg-gradient-to-br from-sky-50 via-white to-primary-50 p-8 lg:col-span-3 lg:p-10 dark:from-ink-900 dark:via-ink-900 dark:to-primary-950/60">
        <h3 class="text-xl font-semibold text-slate-950 dark:text-white">AI-accelerated development</h3>
        <p class="mt-3 max-w-md text-sm leading-relaxed text-muted">Smart tooling and automation shorten iteration cycles, so our engineers spend their time on what matters most — your product.</p>
        <div class="relative mx-auto mt-8 flex aspect-square max-w-[19rem] items-center justify-center" aria-hidden="true">
            <div class="absolute inset-0 rounded-full border border-dashed border-primary-200 dark:border-primary-900"></div>
            <div class="absolute inset-10 rounded-full border border-primary-100 dark:border-primary-950"></div>
            <div class="absolute inset-0 animate-spin-slow">
                @foreach ($aiTools as $tool)
                    @php($angle = ($loop->index / count($aiTools)) * M_PI * 2 - M_PI / 2)
                    <span class="absolute flex h-12 w-12 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-white text-xs font-bold shadow-soft ring-1 ring-slate-200 dark:bg-ink-800 dark:ring-white/10 {{ $tool['color'] }}" style="left: {{ round(50 + 46 * cos($angle), 2) }}%; top: {{ round(50 + 46 * sin($angle), 2) }}%">{{ $tool['label'] }}</span>
                @endforeach
            </div>
            <x-logo-mark class="relative h-24 w-24 drop-shadow-[0_20px_30px_rgba(31,95,240,0.45)]" />
        </div>
    </article>

    <article class="relative overflow-hidden bg-gradient-to-b from-slate-100 to-slate-200/70 p-8 lg:col-span-3 lg:p-10 dark:from-ink-800 dark:to-ink-900">
        <h3 class="text-xl font-semibold text-slate-950 dark:text-white">Battle-tested foundation</h3>
        <p class="mt-3 max-w-md text-sm leading-relaxed text-muted">Production-ready building blocks for auth, payments, admin and deployment — not toy examples.</p>
        <div class="relative mx-auto mt-10 flex h-72 w-full max-w-xs items-end justify-center" aria-hidden="true">
            <div class="absolute bottom-0 h-10 w-full rounded-[50%] bg-slate-400/40 blur-xl dark:bg-black/50"></div>
            <div class="absolute bottom-3 h-12 w-[85%] rounded-xl bg-gradient-to-b from-slate-300 to-slate-400 shadow-inner dark:from-ink-700 dark:to-ink-800"></div>
            <div class="relative mb-9 flex h-60 w-40 items-center justify-center rounded-2xl border border-white/60 bg-gradient-to-br from-amber-100/70 via-teal-200/60 to-primary-500/70 shadow-2xl backdrop-blur-md [transform:perspective(600px)_rotateY(-14deg)] dark:border-white/20">
                <div class="absolute inset-y-0 left-0 w-3 rounded-l-2xl bg-gradient-to-b from-yellow-200/80 to-teal-300/60"></div>
                <div class="flex flex-col items-center gap-2 opacity-90">
                    <x-logo-mark class="h-14 w-14" />
                    <span class="text-lg font-bold text-white drop-shadow">propify</span>
                </div>
            </div>
        </div>
    </article>

    <article class="relative overflow-hidden bg-gradient-to-b from-primary-800 to-primary-950 p-8 text-white lg:col-span-2 lg:p-10">
        <div class="pointer-events-none absolute inset-0 bg-dots-light [background-size:16px_16px] opacity-30" aria-hidden="true"></div>
        <h3 class="relative text-xl font-semibold">Launch in weeks</h3>
        <p class="relative mt-3 text-sm text-primary-100">From idea to production with fortnightly releases you can click through.</p>
        <div class="relative mx-auto mt-10 h-56 max-w-xs" aria-hidden="true">
            <svg viewBox="0 0 200 160" class="absolute inset-0 h-full w-full">
                <defs>
                    <linearGradient id="pyramid-left" x1="0" x2="1"><stop offset="0" stop-color="#5998ff" /><stop offset="1" stop-color="#1f5ff0" /></linearGradient>
                    <linearGradient id="pyramid-right" x1="0" x2="1"><stop offset="0" stop-color="#164bd6" /><stop offset="1" stop-color="#142451" /></linearGradient>
                </defs>
                <polygon points="100,10 30,130 100,150" fill="url(#pyramid-left)" opacity=".95" />
                <polygon points="100,10 170,120 100,150" fill="url(#pyramid-right)" />
            </svg>
            <span class="absolute bottom-10 left-0 rounded-lg border border-white/30 bg-white/15 px-3 py-1.5 text-sm backdrop-blur">Idea</span>
            <span class="absolute right-0 top-16 rounded-lg border border-white/30 bg-white/20 px-3 py-1.5 text-sm backdrop-blur">Production</span>
        </div>
    </article>

    <article class="relative overflow-hidden bg-gradient-to-br from-white via-sky-50 to-primary-100 p-8 lg:col-span-4 lg:p-10 dark:from-ink-900 dark:via-ink-900 dark:to-primary-950/60">
        <div class="grid gap-8 md:grid-cols-2">
            <div>
                <h3 class="text-xl font-semibold text-slate-950 dark:text-white">Full-stack ownership</h3>
                <p class="mt-3 text-sm leading-relaxed text-muted">Web, mobile, cloud and payments — we handle everything end-to-end, so you never coordinate multiple vendors.</p>
            </div>
            <div class="relative h-64" aria-hidden="true">
                <img src="/images/projects/propify.png" alt="" class="absolute right-0 top-0 w-[70%] rounded-xl border-4 border-white object-cover shadow-xl dark:border-ink-700" loading="lazy">
                <img src="/images/projects/hotelia.png" alt="" class="absolute bottom-0 left-0 w-[55%] rounded-xl border-4 border-white object-cover shadow-xl dark:border-ink-700" loading="lazy">
                <img src="/images/projects/rezimi.png" alt="" class="absolute bottom-4 right-6 w-[38%] rotate-3 rounded-xl border-4 border-white object-cover shadow-xl dark:border-ink-700" loading="lazy">
            </div>
        </div>
    </article>

    <article class="relative overflow-hidden bg-gradient-to-br from-slate-100 via-white to-sky-100 p-8 lg:col-span-4 lg:p-10 dark:from-ink-800 dark:via-ink-900 dark:to-ink-900">
        <h3 class="text-xl font-semibold text-slate-950 dark:text-white">Flexible payment</h3>
        <p class="mt-3 text-sm text-muted">Milestone billing in KES or USD — pay the way that works for your business.</p>
        <ul class="mt-8 grid max-w-md grid-cols-3 gap-3" aria-label="Accepted payment methods">
            @foreach ($paymentMethods as $method)
                <li class="flex aspect-[4/3] items-center justify-center rounded-xl bg-gradient-to-br p-2 text-center text-sm font-bold text-white shadow-lg {{ $method['color'] }}">{{ $method['label'] }}</li>
            @endforeach
        </ul>
    </article>

    <article class="relative overflow-hidden bg-gradient-to-b from-primary-700 to-primary-950 p-8 text-white lg:col-span-2 lg:p-10">
        <div class="pointer-events-none absolute inset-0 bg-dots-light [background-size:16px_16px] opacity-25" aria-hidden="true"></div>
        <h3 class="relative text-xl font-semibold">100% transparency</h3>
        <p class="relative mt-3 text-sm text-primary-100">Fixed quotes, open project boards. No hidden fees.</p>
        <div class="relative mt-10 flex justify-center" aria-hidden="true">
            <div class="absolute top-16 h-40 w-40 bg-gradient-to-b from-sky-300/60 to-transparent blur-2xl"></div>
            <div class="relative rounded-2xl border border-white/30 bg-white/15 px-6 py-8 text-center text-xl font-semibold leading-tight shadow-2xl backdrop-blur-md [transform:perspective(500px)_rotateX(18deg)_rotateZ(-8deg)]">No hidden fees,<br>no surprises</div>
        </div>
    </article>
</div>
