@props(['caseStudies'])

<div
    x-data="{
        active: 0,
        count: {{ count($caseStudies) }},
        move(step) {
            this.active = (this.active + step + this.count) % this.count;
            this.$nextTick(() => document.getElementById('case-tab-' + this.active)?.focus());
        },
    }"
    {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-200 via-slate-100 to-primary-100 dark:from-ink-800 dark:via-ink-900 dark:to-primary-950']) }}
>
    <div role="tablist" aria-label="Case studies" class="relative grid gap-2 px-4 pt-6 sm:px-8" style="grid-template-columns: repeat({{ count($caseStudies) }}, minmax(0, 1fr))">
        @foreach ($caseStudies as $caseStudy)
            <button
                id="case-tab-{{ $loop->index }}"
                type="button"
                role="tab"
                aria-controls="case-panel-{{ $loop->index }}"
                x-bind:aria-selected="active === {{ $loop->index }}"
                x-bind:tabindex="active === {{ $loop->index }} ? 0 : -1"
                x-on:click="active = {{ $loop->index }}"
                x-on:keydown.right.prevent="move(1)"
                x-on:keydown.left.prevent="move(-1)"
                class="border-b-2 pb-4 text-center text-xs font-semibold transition sm:text-base"
                x-bind:class="active === {{ $loop->index }} ? 'border-primary-600 text-slate-950 dark:border-primary-400 dark:text-white' : 'border-slate-300/70 text-slate-500 hover:text-slate-800 dark:border-white/10 dark:text-slate-400'"
                @if (! $loop->first) tabindex="-1" @endif
            >{{ $caseStudy['name'] }}</button>
        @endforeach
    </div>

    @foreach ($caseStudies as $caseStudy)
        <div
            id="case-panel-{{ $loop->index }}"
            role="tabpanel"
            aria-labelledby="case-tab-{{ $loop->index }}"
            x-show="active === {{ $loop->index }}"
            @unless ($loop->first) x-cloak @endunless
            class="relative grid items-center gap-10 p-4 sm:p-8 lg:grid-cols-[minmax(0,5fr)_minmax(0,7fr)] lg:p-10"
        >
            <div class="card p-6 sm:p-8">
                <div class="flex items-start justify-between gap-4 border-b border-slate-200 pb-6 dark:border-white/10">
                    <h3 class="text-2xl font-semibold text-slate-950 sm:text-3xl dark:text-white">{{ $caseStudy['name'] }}</h3>
                    <span class="shrink-0 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold dark:border-white/10 dark:bg-white/5">{{ $caseStudy['platform'] }}</span>
                </div>
                <div class="mt-6 flex flex-col gap-6">
                    <div class="flex gap-4">
                        <span aria-hidden="true" class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-teal-400 to-cyan-600 text-white shadow-lg"><x-icon name="target" class="h-5 w-5" /></span>
                        <div>
                            <span class="block font-semibold text-slate-950 dark:text-white">Challenge</span>
                            <span class="mt-1 block text-sm leading-relaxed text-muted">{{ $caseStudy['challenge'] }}</span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <span aria-hidden="true" class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-primary-500 to-primary-700 text-white shadow-lg"><x-icon name="rocket" class="h-5 w-5" /></span>
                        <div>
                            <span class="block font-semibold text-slate-950 dark:text-white">Solution</span>
                            <span class="mt-1 block text-sm leading-relaxed text-muted">{{ $caseStudy['solution'] }}</span>
                        </div>
                    </div>
                </div>
                <dl class="mt-6 grid grid-cols-3 divide-x divide-slate-200 rounded-xl bg-primary-50 p-4 text-sm dark:divide-white/10 dark:bg-primary-950/50">
                    <div class="px-2"><dt class="text-muted">Industry</dt><dd class="mt-1 font-semibold text-slate-950 dark:text-white">{{ $caseStudy['industry'] }}</dd></div>
                    <div class="px-3"><dt class="text-muted">Market</dt><dd class="mt-1 font-semibold text-slate-950 dark:text-white">{{ $caseStudy['market'] }}</dd></div>
                    <div class="px-3"><dt class="text-muted">Platform</dt><dd class="mt-1 font-semibold text-slate-950 dark:text-white">{{ $caseStudy['platform'] }}</dd></div>
                </dl>
                <a href="{{ route('portfolio.show', $caseStudy['slug']) }}" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 dark:text-primary-400">
                    Read the {{ $caseStudy['name'] }} case study <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>
            <x-ui.device-mockup :src="$caseStudy['image']" :alt="$caseStudy['name'].' dashboard screenshot'" class="lg:rotate-[-2deg]" />
        </div>
    @endforeach
</div>
