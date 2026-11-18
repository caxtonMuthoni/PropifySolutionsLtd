@props(['steps', 'detailed' => false])

{{-- Process tree: a central trunk with each step branching off alternately (single trunk on the left on small screens). --}}
<div {{ $attributes->merge(['class' => 'relative mx-auto max-w-5xl']) }}>
    <div class="absolute bottom-6 left-5 top-6 w-0.5 -translate-x-1/2 rounded-full bg-gradient-to-b from-primary-500 via-primary-300 to-accent-400 lg:left-1/2 dark:via-primary-800" aria-hidden="true"></div>

    <ol class="relative">
    @foreach ($steps as $step)
        @php($branchesRight = $loop->odd)
        <li @class(['relative grid pb-10 last:pb-0 lg:grid-cols-2 lg:pb-14', 'lg:-mt-32' => ! $loop->first])>
            <span class="absolute left-5 top-6 z-10 flex h-10 w-10 -translate-x-1/2 items-center justify-center rounded-full bg-gradient-to-br from-primary-500 to-primary-700 text-sm font-semibold text-white shadow-glow ring-4 ring-white lg:left-1/2 dark:ring-ink-950" aria-hidden="true">
                {{ $step['step'] }}
            </span>
            <span @class([
                'absolute left-5 top-11 h-0.5 w-11 bg-primary-300 dark:bg-primary-800',
                'lg:left-1/2 lg:w-14' => $branchesRight,
                'lg:left-auto lg:right-1/2 lg:w-14' => ! $branchesRight,
            ]) aria-hidden="true"></span>

            <div @class([
                'card relative ml-16 p-6',
                'lg:col-start-2 lg:ml-14' => $branchesRight,
                'lg:col-start-1 lg:ml-0 lg:mr-14' => ! $branchesRight,
            ])>
                <p class="text-xs font-semibold uppercase tracking-wider text-primary-600 dark:text-primary-400">Step {{ $step['step'] }}</p>
                <h3 class="mt-2 text-lg font-semibold text-slate-950 dark:text-white">{{ $step['title'] }}</h3>
                <p class="mt-2 text-sm leading-relaxed text-muted">{{ $step['summary'] }}</p>

                @if ($detailed)
                    <ul class="mt-4 flex flex-wrap gap-2" aria-label="{{ $step['title'] }} activities">
                        @foreach ($step['activities'] as $activity)
                            <li class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-300">
                                <x-icon name="check" class="h-3.5 w-3.5 text-emerald-500" />{{ $activity }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <p class="mt-5 inline-flex items-center gap-2 rounded-lg bg-primary-50 px-3 py-2 text-xs font-semibold text-primary-800 dark:bg-primary-950/60 dark:text-primary-200">
                    <x-icon name="badge-check" class="h-4 w-4" /> {{ $step['deliverable'] }}
                </p>
            </div>
        </li>
    @endforeach
    </ol>
</div>
