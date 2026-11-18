@props(['status'])

@if ($status)
    <p {{ $attributes->merge(['class' => 'rounded-xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 dark:bg-emerald-950/50 dark:text-emerald-300']) }} role="status">{{ $status }}</p>
@endif
